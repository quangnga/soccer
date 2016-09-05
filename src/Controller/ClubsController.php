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
        $clubs = $this->paginate($this->Clubs); 
        $this->set(compact('clubs'));
        $this->set('_serialize', ['clubs']);
        //$test= $this->Cities->find('all');
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
            'contain' => [ 'Users']
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
        $this->loadModel('Cities');
        
        $club = $this->Clubs->newEntity();
       if ($this->request->is('post')) {
            $club = $this->Clubs->patchEntity($club, $this->request->data);
            if ($this->Clubs->save($club)) {
                $this->Flash->success(__('The training has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The training could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('club'));
        $this->set('_serialize', ['club']);
        //$cities = $this->Clubs->Cities->find('list', ['limit' => 200]);
        $name_city= $this->Cities->find('all');
        $this->set('name_city', $name_city);
        
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
        
          $time_now = date("H:i:s");
          //var_dump($time_now);exit; 
        $this->loadModel('Cities');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $club = $this->Clubs->patchEntity($club, $this->request->data);
            //var_dump($club);exit;
            $data = $this->Clubs->find('all', [
                'conditions'=>['Clubs.id '=>$club->id]
            ]);
            $date_temp1 = $this->request->data['start_date'];
            $start_day = $date_temp1['year'].'-'.$date_temp1['month'].'-'.$date_temp1['day'];    
            $date_temp2 = $this->request->data['end_date'];
            $end_day = $date_temp2['year'].'-'.$date_temp2['month'].'-'.$date_temp2['day'];           
            foreach($data as $value){
                $articlesTable = TableRegistry::get('Clubs');
                $value = $articlesTable->get($value['id']); 
                //var_dump($this->request->data['start_day']);exit;
                $value->start_date =$start_day;                
                $value->end_date = $end_day;
                $value->number_of_users = (int)$this->request->data['number_of_users'];
                $value->number_of_playing = (int)$this->request->data['number_of_playing'];
                $articlesTable->save($value);
                
            }
            //var_dump($this->request->data['number_users']);exit; 
            
            
            if ($this->Clubs->save($club)) {
                $this->Flash->success(__('The club has been saved.'));
                return $this->redirect(['action' => 'index']);
                
                
            } else {
                $this->Flash->error(__('The club could not be saved. Please, try again.'));
            }
            
        }
        $this->set(compact('club', 'trainings'));
        $this->set('_serialize', ['club']);
        $name_city= $this->Cities->find('all');
        $this->set('name_city', $name_city);
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
        
        
        $this->loadModel('Users');
        $club = $this->Clubs->get($id, [
            'contain' => [ 'Users']
        ]);
       
        $temp1 = $club['close_training'];
            $temp2 = $club['open_training'];
            $time_close = date("H:i:s",strtotime($temp1));
            $time_open = date("H:i:s",strtotime($temp2));
            $this->set('time_close',$time_close);
            $this->set('open_close',$time_open);
            $time_now = date("H:i:s");
            $this->set('time_now',$time_now);
            
            
            if(($time_now>=$time_close)&&($time_now<=$time_open)){
                $is_closed = true;
                //var_dump(1);exit;
            }else{
                $is_closed = false;
            }
            $this->set('is_closed',$is_closed);
        
        //var_dump($time_close);exit; 
        $register_time = date("Y-m-d H:i:s");
        $time2 = new Time($club->training_time);
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
        $max_users = $club['number_of_users'];
        $number_playing = $club['number_of_playing'];
        //var_dump($number_playing);exit;
        
            if($number > $max_users){
                $is_full = true;
            }else{
                $is_full = false;
            }
            $this->set('max_users',$max_users);
            $this->set('is_full', $is_full);
            $this->set('number_playing', $number_playing);
            
            
    }
    
    
    
    public function detail($id= null){
        
        $this->loadModel('Users');
        $club = $this->Clubs->get($id, [
            'contain' => [ 'Users']
        ]);     
        
        $temp1 = $club['close_training'];
            $temp2 = $club['open_training'];
            $time_close = date("H:i:s",strtotime($temp1));
            $time_open = date("H:i:s",strtotime($temp2));
            $this->set('time_close',$time_close);
            $this->set('open_close',$time_open);
            $time_now = date("H:i:s");
            $this->set('time_now',$time_now);
            
            
            if(($time_now>=$time_close)&&($time_now<=$time_open)){
                $is_closed = true;
                //var_dump(1);exit;
            }else{
                $is_closed = false;
            }
            $this->set('is_closed',$is_closed);
        
        
        
        $time2 = new Time($club['training_time']);
        $id_coming = $this->Auth->user('id');
        $dataComing = $this->Users->find('all', [
                'conditions'=>['Users.id '=>$id_coming]
            ]);                    
        $user = $this->Users->get($id_coming, ['condition' => ['Users.id' => $id_coming],]);             
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            //$value = $this->request->data['coming'];
            
            foreach($dataComing as $data){
                $articlesTable = TableRegistry::get('Users');
                $data = $articlesTable->get($data['id']); 
                $temp =  json_decode($data['coming_date']);
                $array = get_object_vars($temp);
                foreach($array as $key=>$value){
                    if($key == strtolower(date("l"))){
                         
                        $array[$key] = (int)$this->request->data['coming'];
                        
                        
                    }
                } 
            $temp2=json_encode($array);
            
            $data->coming_date = $temp2;
            $data->register_time = date("Y-m-d H:i:s");
            //$data->coming_date = $temp2;
            $articlesTable->save($data);
            }   
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__($user->first_name . ' ' . $user->last_name . ' has been added.'));
                //$coming==0;
                
            } else {
                $this->Flash->error(__('The user could not be added. Please, try again.'));
            }                
        }
        //var_dump($temp2);exit;
        $this->set('club', $club);
        $this->set('time2', $time2);
        $user=$this->Auth->user();
        $club_id = $club->id;
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
        $max_users = $club['number_of_users'];
        $number_playing = $club['number_of_playing'];
        //var_dump($number_playing);exit;        
        if($number > $max_users){
            $is_full = true;
        }else{
            $is_full = false;
        }
        $this->set('max_users',$max_users);
        $this->set('is_full', $is_full);
        $this->set('number_playing', $number_playing);
        //count order
        
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
        usort($show_member, array($this, "__cmp"));
        //var_dump($show_member);exit;
        
        $this->set('show_member',$show_member);           
    }
    private function __cmp($a, $b)
        {
            return 1 * strcmp($a['register_time'], $b['register_time']);
        }
    
}
