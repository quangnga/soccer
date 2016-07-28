<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Email\Email;
use Cake\Routing\Router;
/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 */
class CitiesController extends AppController
{
    
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
     
       public function beforeFilter(Event $event)
    {
        
            parent::beforeFilter($event);
            // Allow users to register and logout.
            // You should not add the "login" action to allow list. Doing so would
            // cause problems with normal functioning of AuthComponent.
            
            // only supper admin access to all
            $this->Auth->allow();
            
            
        }
    public function index()
    {
        $this->loadModel('Clubs');
        $this->paginate = [
            'contain' => ['Clubs']
        ];

        $cities = $this->paginate($this->Cities);
       
        $this->set(compact('cities'));
        $this->set('_serialize', ['cities']);
        
        $this->loadModel('Clubs');
        $this->loadModel('Cities');
        $datas = $this->Cities->find('all');
        $this->set('datas',$datas);
        $datas2 = $this->Clubs->find('all');
        $this->set('datas2',$datas2);
        if ($this->request->is('post')){
            
            $m = $this->request->data('cityId');
            
            $this->set('m',$m);
            //var_dump($m);exit;  
            //var_dump($_POST["cityId"]);exit;
        }
          
        //var_dump($clubs->club_id);exit;
            
    }

    /**
     * View method
     *
     * @param string|null $id City id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $city = $this->Cities->get($id, [
            'contain' => ['Clubs']
        ]);

        $this->set('city', $city);
        $this->set('_serialize', ['city']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $city = $this->Cities->newEntity();
        if ($this->request->is('post')) {
            $city = $this->Cities->patchEntity($city, $this->request->data);
            if ($this->Cities->save($city)) {
                $this->Flash->success(__('The city has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The city could not be saved. Please, try again.'));
            }
        }
        $clubs = $this->Cities->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('city', 'clubs'));
        $this->set('_serialize', ['city']);
    }

    /**
     * Edit method
     *
     * @param string|null $id City id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $city = $this->Cities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $city = $this->Cities->patchEntity($city, $this->request->data);
            if ($this->Cities->save($city)) {
                $this->Flash->success(__('The city has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The city could not be saved. Please, try again.'));
            }
        }
        $clubs = $this->Cities->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('city', 'clubs'));
        $this->set('_serialize', ['city']);
    }

    /**
     * Delete method
     *
     * @param string|null $id City id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $city = $this->Cities->get($id);
        if ($this->Cities->delete($city)) {
            $this->Flash->success(__('The city has been deleted.'));
        } else {
            $this->Flash->error(__('The city could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    



        public function loadAjax(){
            
            
            
        }
}
