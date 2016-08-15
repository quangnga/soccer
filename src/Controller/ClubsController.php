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
        $this->loadModel('Cities');
        //$id1=$this->loadModel('Cities');
        //$city= $this->Cities
        
		$id = $this->Auth->user('id');
        $username = $this->Auth->user('username');        
        $club = $this->Auth->user('club_id'); 
        
        $this->paginate = [
            'contain' => ['Trainings']
        ];
        $clubs = $this->paginate($this->Clubs); 
        
           
        $this->set(compact('clubs'));
        $this->set('_serialize', ['clubs']);
        $test= $this->Cities->find('all');
        //var_dump($test);exit;
        
        
        
        
        
        
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
            $this->Auth->allow(['view','index','logout','detail','edit','advanced']);
            
        }
        else{
            $this->Auth->allow(['index','logout','detail','view','advanced']);
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
        //var_dump($club);exit;
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
    
    
            
            
    public function advanced($id=null){
        
        $this->loadModel('Trainings');
        $this->loadModel('Users');
        $club = $this->Clubs->get($id, [
            'contain' => ['Trainings', 'Users']
        ]);
        $training = $this->Trainings->get($club["training_id"], [
            'contain' => []
        ]);
        $time2 = new Time($training['training_time']);
        $id_coming = $this->Auth->user('id');
        //var_dump($id_coming);
        
        $user = $this->Users->get($id_coming, ['condition' => ['user_id' => $id_coming]]);
            $date_data = $user['coming_date'];
           
            if(empty($date_data)){
                $get_comings = array('monday'=>0,'tuesday'=>0,'wendesday'=>0,'thursday'=>0,'friday'=>0,'saturday'=>0,'sunday'=>0);
            }else{
                $get_comings = json_decode($date_data);
                
            }
             //var_dump($get_comings);exit;
        if ($this->request->is(['patch', 'post', 'put'])) {
            //$id_user = $this->request->data['id'];
            
            //$data_show = array('monday','tuesday','wendesday','thursday','friday','saturday','sunday');
            
            $save_comings = array('monday'=>0,'tuesday'=>0,'wendesday'=>0,'thursday'=>0,'friday'=>0,'saturday'=>0,'sunday'=>0);
            //var_dump($save_comings[0]);exit;
            foreach($get_comings as $key => $get_coming){
                
                 if($this->request->data[$key] == 1){
                        $save_comings[$key] = 1;
                        
                    }
            }
            
            //var_dump($this->request->data[$key]);exit;
            $save_coming_data = json_encode($save_comings);
            $dataComing = $this->Users->find('all', [
                'conditions'=>['Users.id '=>$id_coming]
            ]);
            
            
            foreach($dataComing as $data){
                $articlesTable = TableRegistry::get('Users');
                
                $data = $articlesTable->get($data['id']); 
                $data->coming_date = $save_coming_data;
                $articlesTable->save($data);
            }
            
                    
            $user = $this->Users->patchEntity($user, $this->request->data);
            //var_dump($user);exit;
            if ($this->Users->save($user)) {
                $this->Flash->success(__($user->first_name . ' ' . $user->last_name . ' has been added.'));
                //$coming==0;
                
            } else {
                $this->Flash->error(__('The user could not be added. Please, try again.'));
            }
                    
        }
        $user = $this->Users->get($id_coming, ['condition' => ['user_id' => $id_coming]]);
        $date_data = $user['coming_date'];
        if(empty($date_data)){
            $get_comings = array('monday'=>0,'tuesday'=>0,'wendesday'=>0,'thursday'=>0,'friday'=>0,'saturday'=>0,'sunday'=>0);
        }else{
            $get_comings = json_decode($date_data);
            
        }
            $this->set('club', $club);
            $this->set('time2', $time2);
            $this->set('get_comings', $get_comings);
            
            $user=$this->Auth->user();
            $club_id = $user['club_id'];
            $query= $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id,'Users.coming'=>1,'Users.block'=>0]]);        
            $number = $query->count();
            //var_dump($number);exit;
            $this->set('number',$number);
            $query2 = $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id]]);
            $num_all=   $query2->count();
            $this->set('num_all',$num_all);
            //var_dump($num_all);exit;
            $block=$user['block'];
            $this->set('block',$block);
            $this->set('id',$id);

            $this->set('users', $this->paginate($this->Users));
    }
    public function detail($id= null){
        $this->loadModel('Trainings');
        $this->loadModel('Users');
        $club = $this->Clubs->get($id, [
            'contain' => ['Trainings', 'Users']
        ]);
        
        
        $training = $this->Trainings->get($club["training_id"], [
            'contain' => []
        ]);
        $max_playing = $training['number_of_playing'];
        $this->set('max_playing',$max_playing);
        //var_dump();exit;
        
        $time2 = new Time($training['training_time']);
        $id_coming = $this->Auth->user('id'); 
        $user = $this->Users->get($id_coming, ['condition' => ['user_id' => $id_coming], 'order' => ['Users.coming'=>'desc']]);
        $date_data = $user['coming_date'];
        $data_coming= $user['coming'];
        $get_comings = json_decode($date_data);
        $today = strtolower(date("l"));
        
        //get value coming from coming_date
        foreach($get_comings as $key => $get_coming){
            if($key==$today && $get_coming == 1){
               $data_coming = 1; 
                
            }else{
                $data_coming = 0;
            }
            
            $dataComing = $this->Users->find('all', [
                'conditions'=>['Users.id '=>$id_coming]
                , 'order' => ['Users.coming'=>'desc']
            ]);
            
            
            foreach($dataComing as $data){
                $articlesTable = TableRegistry::get('Users');
                
                $data = $articlesTable->get($data['id']); 
                $data->coming = $data_coming;
                $articlesTable->save($data);
            }
            //var_dump($data);exit;
        }
        //end section get value.
        if ($this->request->is(['patch', 'post', 'put'])) {
            $id_user = $this->request->data['id'];
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
           
            //count users coming
            $user=$this->Auth->user();
            $club_id = $user['club_id'];
            $query= $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id,'Users.coming'=>1,'Users.block'=>0]]);        
            $number = $query->count();
            //var_dump($number);exit;
            $this->set('number',$number);
            $query2 = $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id]]);
            $num_all=   $query2->count();
            
            $this->set('num_all',$num_all);
            //var_dump($num_all);exit;
            $block=$user['block'];
            $this->set('block',$block);
       
            $this->set('users', $this->paginate($this->Users));
       
    }
    
}
