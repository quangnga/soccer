<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;

use Cake\Network\Exception\NotFoundException;
use Cake\Network\Email\Email;
use Cake\Routing\Router;

/**
 * Clubs Controller
 *
 * @property \App\Model\Table\ClubsTable $Clubs
 */
class ClubsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {   
		$id = $this->Auth->user('id');
        $username = $this->Auth->user('username');
        
        $club = $this->Auth->user('club_id');
        
        $this->paginate = [
            'contain' => ['Trainings']
        ];
        $clubs = $this->paginate($this->Clubs);
        

        $this->set(compact('clubs'));
        $this->set('_serialize', ['clubs']);
        
        //reset value coming
        
    }
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        
        // only supper admin access to all
        if($this->isAuthorizedAdmin()==1){
            $this->Auth->allow();
            
        }else if($this->isAuthorizedAdmin()==2){
            $this->Auth->allow(['view','index','logout','detail','edit']);
            
        }
        else{
            $this->Auth->allow(['index','logout','detail','view']);
        }
    }
   
    /**
     * View method
     *
     * @param string|null $id Club id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $club = $this->Clubs->get($id, [
            'contain' => ['Trainings', 'Users']
        ]);
        //var_dump($club);exit;
        $this->set('club', $club);
        $this->set('_serialize', ['club']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $club = $this->Clubs->newEntity();
        if ($this->request->is('post')) {
            $club = $this->Clubs->patchEntity($club, $this->request->data);
            if ($this->Clubs->save($club)) {
                $this->Flash->success(__('The club has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The club could not be saved. Please, try again.'));
            }
        }
        $trainings = $this->Clubs->Trainings->find('list', ['limit' => 200]);
        $this->set(compact('club', 'trainings'));
        $this->set('_serialize', ['club']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Club id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $club = $this->Clubs->get($id, [
            'contain' => []
        ]);
        var_dump($club);exit;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $club = $this->Clubs->patchEntity($club, $this->request->data);
            if ($this->Clubs->save($club)) {
                $this->Flash->success(__('The club has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The club could not be saved. Please, try again.'));
            }
        }
        $trainings = $this->Clubs->Trainings->find('list', ['limit' => 200]);
        $this->set(compact('club', 'trainings'));
        $this->set('_serialize', ['club']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Club id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $club = $this->Clubs->get($id);
        if ($this->Clubs->delete($club)) {
            $this->Flash->success(__('The club has been deleted.'));
        } else {
            $this->Flash->error(__('The club could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function logout()
    {
        $this->Flash->success('You are now logged out!');
        $this->Auth->Logout();
        return $this->redirect('/Users/login');
    }
    
    public function detail($id= null){
        $this->loadModel('Trainings');
        $this->loadModel('Users');
        $club = $this->Clubs->get($id, [
            'contain' => ['Trainings', 'Users']
        ]);
        
        
          /*
            
            $club = $this->Users->get($id, [
        
        'joins' => array(
        array(
            'table' => 'users',
            'alias' => 'Users',
            'type' => 'INNER',
            'conditions' => array(
                'Users.Club_id = Clubs.id',
            )
        )
        ),
            'conditions' => array(
            'Users.coming'=>1
            ),            
            ]);
            */
        
        $training = $this->Trainings->get($club["training_id"], [
            'contain' => []
        ]);
        $time2 = new Time($training['training_time']);
        $id_coming = $this->Auth->user('id');
        
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $id_user = $this->request->data['id'];
            //var_dump($id_user);exit;
            //$user = $this->Users->patchEntity($user, $this->request->data);
            //$this->Users->save($user);
            $user = $this->Users->get($id_user, ['condition' => ['user_id' => $id_user]]);
            $user = $this->Users->patchEntity($user, $this->request->data);
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__($user->first_name . ' ' . $user->last_name . ' has been added.'));
                //$coming==0;
                
            } else {
                $this->Flash->error(__('The user could not be added. Please, try again.'));
            }
                    
            }
            $this->set('club', $club);
            $this->set('time2', $time2);
           
            
            $user=$this->Auth->user();
            $club_id = $user['club_id'];
            $query= $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id,'Users.coming'=>1,'Users.block'=>0]]);        
            //var_dump($query);exit;
            //$counts= $this->Users->find('count');
            $number = $query->count();
            //var_dump($number);exit;
            $this->set('number',$number);
            $query2 = $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id]]);
            $num_all=   $query2->count();
            $this->set('num_all',$num_all);
            //var_dump($num_all);exit;
            $block=$user['block'];
            $this->set('block',$block);
         
         
        
       // var_dump($this->Clubs);exit;
         
        //$user = $this->Auth->user('id');
        $this->set('users', $this->paginate($this->Users));
        //$this->set('club', $this->paginate($this->Clubs));
        //$this->set('club_id',$club_id);        
        //var_dump($this->paginate);exit;
        //$this->set('user',$user);
        //$this->set('_serialize', ['club']);
        
        //$detail = $this->Users->get($id, [
          //  'contain' => ['Trainings', 'Users']
        //]);
        //$this->set('detail', $detail);
    }
    
}
