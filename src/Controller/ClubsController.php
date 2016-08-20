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
        $register_time = date("Y-m-d H:i:s");
        $time2 = new Time($training['training_time']);
        $id_coming = $this->Auth->user('id');    
        $user = $this->Users->get($id_coming, ['condition' => ['Users.id' => $id_coming]]);
            $date_data = $user['coming_date'];          
            if(empty($date_data)){
                $get_comings = array('monday'=>0,'tuesday'=>0,'wednesday'=>0,'thursday'=>0,'friday'=>0,'saturday'=>0,'sunday'=>0);
            }else{
                $get_comings = json_decode($date_data);                
            }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $save_comings = array('monday'=>0,'tuesday'=>0,'wednesday'=>0,'thursday'=>0,'friday'=>0,'saturday'=>0,'sunday'=>0);
            //var_dump($save_comings[0]);exit;
            foreach($get_comings as $key => $get_coming){                
                 if($this->request->data[$key] == 1){
                        $save_comings[$key] = 1;                        
                    }
            }
            $save_coming_data = json_encode($save_comings);
            $dataComing = $this->Users->find('all', [
                'conditions'=>['Users.id '=>$id_coming]
            ]);            
            foreach($dataComing as $data){
                $articlesTable = TableRegistry::get('Users');
                
                $data = $articlesTable->get($data['id']); 
                $data->coming_date = $save_coming_data;
                $data->register_time = $register_time;
                $articlesTable->save($data);
            }
         $user = $this->Users->patchEntity($user, $this->request->data);
            //var_dump($user);exit;
            if ($this->Users->save($user)) {
                $this->Flash->success(__($user->first_name . ' ' . $user->last_name . ' has been added.'));              
            } else {
                $this->Flash->error(__('The user could not be added. Please, try again.'));
            }                  
        }
        $user = $this->Users->get($id_coming, ['condition' => ['user_id' => $id_coming]]);
        $date_data = $user['coming_date'];
            if(empty($date_data)){
                $get_comings = array('monday'=>0,'tuesday'=>0,'wednesday'=>0,'thursday'=>0,'friday'=>0,'saturday'=>0,'sunday'=>0);
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
        $max_playing = $training['number_of_users'];
            if($number > $max_playing){
                $is_full = true;
            }else{
                $is_full = false;
            }
            $this->set('max_playing',$max_playing);
            $this->set('is_full', $is_full);
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
        $time2 = new Time($training['training_time']);
        $id_coming = $this->Auth->user('id');     
        $user = $this->Users->get($id_coming, ['condition' => ['Users.id' => $id_coming],]);
        $date_data = $user['coming_date'];
        $data_coming= $user['coming'];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $id_user = $this->request->data['id'];
            $user = $this->Users->get($id_user, ['condition' => ['Users.id' => $id_user]]);
            $user = $this->Users->patchEntity($user, $this->request->data);
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__($user->first_name . ' ' . $user->last_name . ' has been added.'));
                //$coming==0;
                
            } else {
                $this->Flash->error(__('The user could not be added. Please, try again.'));
            }
            
                    
        }
        $max_playing = $training['number_of_users'];
        $this->set('max_playing', $max_playing);
        $this->set('club', $club);
        $this->set('time2', $time2);
        $user=$this->Auth->user();
        $club_id = $user['club_id'];
        $query= $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id,'Users.coming'=>1,'Users.block'=>0]]);        
        $number = $query->count();
        //var_dump($number);exit;
        $this->set('number',$number);
        $query2 = $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id]]);
        $num_all=   $query2->count();        
        $this->set('num_all',$num_all);
        $block=$user['block'];
        $this->set('block',$block); 
        $this->set('users', $this->paginate($this->Users));
        
        //test
        
        $show_member = array();
        $datas = array(); 
        $i=0;
        
        
        
        foreach($club->users as $value){
            $temp = json_decode($value);
            //          
            $array = get_object_vars($temp);
            //var_dump($array['coming']);
            if($array['coming']==1){
              $datas[$i] = $array;
              $i++;  
            }  
            
        }
        $show_member = $datas;
        
        //$sortedByName = sorted($show_member, itemGetter('name'));
        
        
        usort($show_member, array($this, "__cmp"));
        //var_dump($show_member);exit;
        
        $this->set('show_member',$show_member);           
    }
    private function __cmp($a, $b)
        {
            return 1 * strcmp($a['register_time'], $b['register_time']);
        }
    
}
