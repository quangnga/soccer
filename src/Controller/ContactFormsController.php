<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;



/**
 * ContactForms Controller
 *
 * @property \App\Model\Table\ContactFormsTable $ContactForms
 */
class ContactFormsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add','view','index','delete']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $query = TableRegistry::get('ContactForms')->find('all')->orderDesc('ContactForms.created');
        $this->set('contactForms', $this->paginate($query));
        $this->set('_serialize', ['contactForms']);
    }

    /**
     * View method
     *
     * @param string|null $id Contact Form id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactForm = $this->ContactForms->get($id, [
            'contain' => []
        ]);
        if($contactForm['new']==1){//If message unread
            $contactForm->set('new', '0');//Setting message to read
            $this->ContactForms->save($contactForm);//Save the changes
        }

        $this->set('contactForm', $contactForm);//Setting the variables
        $this->set('_serialize', ['contactForm']);//Setting the variables
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactForm = $this->ContactForms->newEntity();
        $info=TableRegistry::get('contact_form_info')->find()->where(['id'=>1]);
        $this->set('info', $info);
        $this->set('_serialize', ['info']);
        if ($this->request->is('post')) {
            //debug($this->request->data);
            if($this->request->data['phone_number']==''and $this->request->data['email']=='' ){
                $this->Flash->error(__('Please enter a phone number or email'));
            }else {
                $contactForm = $this->ContactForms->patchEntity($contactForm, $this->request->data);
                if ($this->ContactForms->save($contactForm)) {
                    $this->Flash->success(__('Contact form submitted!.'));
                    return $this->redirect(['action' => 'add']);
                } else {
                    $this->Flash->error(__('The contact form could not be submitted. Please, try again.'));
                }
            }
        }
        $this->set(compact('info'));
        $this->set('_serialize', ['info']);
        $this->set(compact('contactForm'));
        $this->set('_serialize', ['contactForm']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact Form id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactForm = $this->ContactForms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactForm = $this->ContactForms->patchEntity($contactForm, $this->request->data);
            if ($this->ContactForms->save($contactForm)) {
                $this->Flash->success(__('The contact form has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contact form could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('contactForm'));
        $this->set('_serialize', ['contactForm']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact Form id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $contactForm = $this->ContactForms->get($id);
        if ($this->ContactForms->delete($contactForm)) {
            $this->Flash->success(__($contactForm->first_name . '\' s message' . ' has been deleted.'));
        } else {
            $this->Flash->error(__('The contact form could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
