<?php
namespace App\Controller;



use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;

use Cake\Network\Email\Email;
use Cake\Routing\Router;

/**
 * CitiesRegions Controller
 *
 * @property \App\Model\Table\CitiesRegionsTable $CitiesRegions
 */
class CitiesRegionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
     
     public function beforeFilter(Event $event)
        {
            
            parent::beforeFilter($event);

            if($this->isAuthorizedAdmin()==1){
                $this->Auth->allow();
                
            }else if($this->isAuthorizedAdmin()==2){
                $this->Auth->allow();
                
            }
       
            else{
                $this->Auth->allow();
            }
            
            
            
        }
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cities', 'Regions']
        ];
        $citiesRegions = $this->paginate($this->CitiesRegions);

        $this->set(compact('citiesRegions'));
        $this->set('_serialize', ['citiesRegions']);
    }

    /**
     * View method
     *
     * @param string|null $id Cities Region id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $citiesRegion = $this->CitiesRegions->get($id, [
            'contain' => ['Cities', 'Regions']
        ]);

        $this->set('citiesRegion', $citiesRegion);
        $this->set('_serialize', ['citiesRegion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $citiesRegion = $this->CitiesRegions->newEntity();
        if ($this->request->is('post')) {
            $citiesRegion = $this->CitiesRegions->patchEntity($citiesRegion, $this->request->data);
            if ($this->CitiesRegions->save($citiesRegion)) {
                $this->Flash->success(__('The cities region has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cities region could not be saved. Please, try again.'));
            }
        }
        $cities = $this->CitiesRegions->Cities->find('list', ['limit' => 200]);
        $regions = $this->CitiesRegions->Regions->find('list', ['limit' => 200]);
        $this->set(compact('citiesRegion', 'cities', 'regions'));
        $this->set('_serialize', ['citiesRegion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cities Region id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $citiesRegion = $this->CitiesRegions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $citiesRegion = $this->CitiesRegions->patchEntity($citiesRegion, $this->request->data);
            if ($this->CitiesRegions->save($citiesRegion)) {
                $this->Flash->success(__('The cities region has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cities region could not be saved. Please, try again.'));
            }
        }
        $cities = $this->CitiesRegions->Cities->find('list', ['limit' => 200]);
        $regions = $this->CitiesRegions->Regions->find('list', ['limit' => 200]);
        $this->set(compact('citiesRegion', 'cities', 'regions'));
        $this->set('_serialize', ['citiesRegion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cities Region id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $citiesRegion = $this->CitiesRegions->get($id);
        if ($this->CitiesRegions->delete($citiesRegion)) {
            $this->Flash->success(__('The cities region has been deleted.'));
        } else {
            $this->Flash->error(__('The cities region could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
