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
		$id = $this->Auth->user('id');
        $club_id = $this->Auth->user('club_id');
        if(empty($id)){
              $this->redirect('/');  
            } 
        $this->paginate = [
        'limit'=>10,
        'contain' => ['Users']
        ];
        $role = $this->Auth->user('role');
        if($role != 0){
           $clubs = $this->paginate($this->Clubs); 
        }else{
           $clubs = $this->Clubs->find('all',['conditions'=>['Clubs.id'=> $club_id]]);
        }
                 
        $this->set(compact('clubs'));
        $this->set('_serialize', ['clubs']);
        $time_now = date("H:i:s");       
    }
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        if($this->isAuthorizedAdmin()==1){
            $this->Auth->allow();
            
        }else if($this->isAuthorizedAdmin()==2){
            $this->Auth->allow(['view','index','logout','detail','edit','advanced','unlock','active','reports','reportsAdd','reportsView']);
            
        }
        else{
            $this->Auth->allow(['index','logout','detail','view','advanced','reports','reportsView']);
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
        $this->loadModel('Cities');
        $club = $this->Clubs->get($id, [
            'contain' => [ 'Users']
        ]);
        
        $id_user = $this->Auth->user('role');        
        $club_user = $this->Auth->user('club_id');
        $city_name = $this->Cities->find('all',['conditions'=>['Cities.id'=>$club->city_id]] );
        foreach($city_name as $name){
           $cty_name=($name['city_name']); 
        }
        $this->set('cty_name',$cty_name);
        if((($id_user == 0)||($id_user==2))&&($club_user==$club->id)){
            $view = 1;
        }elseif($id_user == 1){
            $view = 1;
        }else{
             $view = 0;
        }
        $this->set('view', $view);
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
            //var_dump($club);exit;
            if ($this->Clubs->save($club)) {
                $this->Flash->success(__('The training has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The training could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('club'));
        $this->set('_serialize', ['club']);
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
        $this->loadModel('Cities');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $club = $this->Clubs->patchEntity($club, $this->request->data);
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
                $value->start_date =$start_day;                
                $value->end_date = $end_day;
                $value->number_of_users = (int)$this->request->data['number_of_users'];
                $value->number_of_playing = (int)$this->request->data['number_of_playing'];
                $articlesTable->save($value);
                
            }
            
            
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
    
    
     public function comingClose($time_close, $time_open){
        
        $close = date("H:i:s",strtotime($time_close));
        $open = date("H:i:s",strtotime($time_open));
        $now = date("H:i:s");
        
        if(($now>=$close)&&($now<=$open)){
            return $is_closed = true;
        }else{
            return $is_closed = false;
        }
    }        
            
    public function advanced($id=null){
        
        
        $this->loadModel('Users');
        $id_coming = $this->Auth->user('id'); 
        if(!empty($id_coming)){
            $club = $this->Clubs->get($id, [
                'contain' => [ 'Users']
            ]);
           
            $temp1 = $club['close_training'];
            $temp2 = $club['open_training'];
            $is_closed = $this->comingClose($temp1,$temp2);
            $this->set('is_closed',$is_closed);
                
            $id_user = $this->Auth->user('role');
            $club_user = $this->Auth->user('club_id');
            if($club_user==$club->id){
                $advanced = 1;
            }else{
                $advanced = 0;
            }  
            $this->set('advanced',$advanced);
            
    
            $register_time = date("Y-m-d H:i:s");
            $time2 = new Time($club->training_time);
              
             
            $user = $this->Users->get($id_coming, ['conditions' => ['Users.id' => $id_coming]]);
                $date_data = $user['coming_date'];          
                if(empty($date_data)){
                    $get_comings = array('monday'=>0,'tuesday'=>0,'wednesday'=>0,'thursday'=>0,'friday'=>0,'saturday'=>0,'sunday'=>0);
                }else{
                    $get_comings = json_decode($date_data);                
                }
            if ($this->request->is(['patch', 'post', 'put'])) {
                $save_comings = array('monday'=>0,'tuesday'=>0,'wednesday'=>0,'thursday'=>0,'friday'=>0,'saturday'=>0,'sunday'=>0);
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
                if ($this->Users->save($user)) {
                    $this->Flash->success(__($user->first_name . ' ' . $user->last_name . ' has been added.'));              
                } else {
                    $this->Flash->error(__('The user could not be added. Please, try again.'));
                } 
                                 
            }
            
            $date_data = $user['coming_date'];
                if(empty($date_data)){
                    $get_comings = array('monday'=>0,'tuesday'=>0,'wednesday'=>0,'thursday'=>0,'friday'=>0,'saturday'=>0,'sunday'=>0);
                }else{
                    $get_comings = json_decode($date_data);
                    
                }
            $this->set('club', $club);
            $this->set('time2', $time2);
            $this->set('get_comings', $get_comings);
    
            $club_id = $user['club_id'];
            
            $query= $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id,'Users.coming'=>1,'Users.block'=>0]]);        
            $number = $query->count();
            $this->set('number',$number);
            
            $query2 = $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id]]);
            $num_all=   $query2->count();
            $this->set('num_all',$num_all);
            
            $block=$user['block'];
            $this->set('block',$block);
            
            $this->set('id',$id);
            $this->set('users', $this->paginate($this->Users));
            
            $max_users = $club['number_of_users'];
            $number_playing = $club['number_of_playing'];
    
            
            if($number >= $max_users){
                $is_full = true;
            }else{
                $is_full = false;
            }
            $this->set('max_users',$max_users);
            $this->set('is_full', $is_full);
            $this->set('number_playing', $number_playing);
            
        }else{
             return $this->redirect(['controller' => 'Users', 'action' => 'login', '']);
        }
        
            
            
    }
    
    public function getYesterday($day){
        
        switch ($day) {
                case 'monday':
                    $yesterday = 'sunday';
                    break;
                case 'tuesday':
                    $yesterday = 'monday';
                    break;    
                case 'wednesday':
                    $yesterday = 'tuesday';
                    break;
                case 'thursday':
                    $yesterday = 'wednesday';
                    break;
                case 'friday':
                    $yesterday = 'thursday';
                    break;
                case 'saturday':
                    $yesterday = 'friday';
                    break;
                
                default:
                    $yesterday = 'saturday';
                    break;
            }
        return $yesterday;
    }
    
   
    
    public function detail($id= null){
        
        
        $this->loadModel('Users');
        $id_coming = $this->Auth->user('id');
        if(!empty($id_coming)){
            $club = $this->Clubs->get($id, [
            'contain' => [ 'Users']
        ]);     
        
        $temp1 = $club['close_training'];
        $temp2 = $club['open_training'];
        
        $is_closed = $this->comingClose($temp1,$temp2);
        $this->set('is_closed',$is_closed);
        
        $time2 = new Time($club['training_time']);
        
        
        //var_dump($id_coming);exit;
        $role = $this->Auth->user('role');        
       
        $dataComing = $this->Users->find('all', [
                'conditions'=>['Users.id '=>$id_coming]
            ]);                    
        $user = $this->Users->get($id_coming, ['conditions' => ['Users.id' => $id_coming],]);             
         

        $club_id = $club->id;
        //var_dump($club_id);exit;
        $query= $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id,'Users.coming'=>1,'Users.block'=>0]]);        
        $number = $query->count();       
        $this->set('number',$number);
        
        $query2 = $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id]]);
        $num_all=   $query2->count();        
        $this->set('num_all',$num_all);
        
        $block=$user['block'];
        $this->set('block',$block); 
        
        
        $max_users = $club['number_of_users'];
        $number_playing = $club['number_of_playing'];
              
        if($number > $max_users){
            $is_full = true;
        }else{
            $is_full = false;
        }
        
        
       if ($this->request->is(['patch', 'post', 'put'])) { 
            if(($this->request->data('block'))==NULL){
                //code send coming and condition
                $value_coming= (int)$this->request->data('coming');
                //var_dump($value_coming);exit;
                $count=0;
                if(($value_coming==0)&&($is_full==true)){
                    $this->Users->save($user);
                    $this->Flash->success(__($user->first_name . ' ' . $user->last_name . ' has been added.'));
                    $count=0;                                                            
                }else{
                    if(($value_coming==1)&&($is_full==true)&&($user['coming']==0)&&($role==0)){
                        $this->Flash->error(__('Training full...'));
                        return $this->redirect(['action' => 'index']);
                        
                    }elseif(($value_coming==1)&&($user['coming']==1)){
                        return $this->redirect($this->here);
                        
                        
                    }else{
                        if($value_coming==1){
                            $count=1;
                        }
                        $this->Users->save($user);
                        $this->Flash->success(__($user->first_name . ' ' . $user->last_name . ' has been added.'));
                        //return $this->redirect($this->here);
                    }
                }
                //var_dump($count);exit;
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
                $data->comment = $this->request->data['comment']; 
                $data->coming_date = $temp2;
                $data->register_time = date("Y-m-d H:i:s");
                
                $data->count_coming = (int)$data['count_coming'] + $count;
                 
                $articlesTable->save($data);
                
                
                }   
              return $this->redirect($this->here);  
                      
            }else{
                //do block user
                $id_block = (int)$this->request->data['id'];
                
                $dataBlock = $this->Users->find('all', [
                'conditions'=>['Users.id '=>$id_block]
                ]);  
                foreach($dataBlock as $data){
                    
                $articlesTable = TableRegistry::get('Users');
                $data->block = $this->request->data('block');
                $articlesTable->save($data);

                }      
            return $this->redirect($this->here);
                
            }
        }
        
        $this->set('max_users',$max_users);
        $this->set('is_full', $is_full);
        $this->set('number_playing', $number_playing);
        $this->set('club', $club);
        $this->set('time2', $time2);
        $this->set('users', $this->paginate($this->Users)); 
        
        //set value coming yesterday
        
        $day_now = strtolower(date("l"));
        $yesterday = $this->getYesterday($day_now);
        
        // code load list users playing and waiting
        $training_yesterday = $club->$yesterday;
        //case clubs have training yesterday
        if($training_yesterday){
            $data_playing = $this->Users->find('all',['conditions'=>['Users.club_id' => $club_id,'Users.coming'=>1,'Users.coming_yesterday'=>1,'Users.block'=>0]
                                                        ,'order'=>['register_time'=>'ASC'],'limit'=>$number_playing]);
            $data_waiting = $this->Users->find('all', ['conditions'=>['Users.club_id' => $club_id,'Users.coming'=>1,'Users.block'=>0]
                                                        ,'order'=>['register_time'=>'ASC'],'limit'=>$max_users]);
            
            $total = $data_playing->count();// count number of users playing
            
            if($total >= $number_playing){
                 $db_waiting = array();
                 $k=0;
                 foreach($data_waiting as $data){
                    
                    $db_waiting[$k] = $data;
                    $k++;
                }
                $db_waiting = array_slice($db_waiting, $number_playing);
            }else{
                
                $db_waiting = $this->Users->find('all', ['conditions'=>['Users.club_id' => $club_id,'Users.coming'=>1,'Users.coming_yesterday'=>0,'Users.block'=>0],
                                                       'order'=>['register_time'=>'ASC']]);
            }
            
            $this->set('data_playing',$data_playing);
            $this->set('data_waiting',$db_waiting);
            
                                                        
        }else{// clubs haven't training yesterday
  
          $data_playing = $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id,'Users.coming'=>1,'Users.block'=>0],
                                                    'order'=>['register_time'=>'ASC'],'limit'=>$number_playing
                                                    ]);
          $total = $data_playing->count();  
                                                    
          if($total <= $number_playing){
            $db_waiting = null;
          }else{
            $data_waiting = $this->Users->find('all', ['conditions'=>['Users.club_id' => $club_id,'Users.coming'=>1,'Users.block'=>0]
                                                        ,'order'=>['register_time'=>'ASC'],'limit'=>$max_users]);
            $db_waiting = array();
                 $k=0;
                 foreach($data_waiting as $data){
                    $db_waiting[$k] = $data;
                    $k++;
                }
            $db_waiting = array_slice($db_waiting, $number_playing);
          }
        $this->set('data_playing',$data_playing);
        $this->set('data_waiting',$db_waiting);  
        }
        
        //set status for user...
        $db_wting = array();
        $l=0;
        foreach( $db_waiting as $db){
            $db_wting[$l] = $db['id'];
            $l++;
            
        }
        
        $db_play = array();
        $m=0;
        foreach( $data_playing as $db){
            //var_dump($db['id']);
            $db_play[$m] = $db['id'];
            $m++;
                
        }//exit;
        
        $this->set('db_wting',$db_wting);
        $this->set('db_play',$db_play);
        $this->set('total',$total);
        }else{
             return $this->redirect(['controller' => 'Users', 'action' => 'login', '']);
        }
        
        
        
         
    }
    
    public function getregions(){
        
        if ($this->request->is('post')) {
            
            $city_id = $this->request->data['city_id'];
            $this->loadModel('CitiesRegions');
            $this->loadModel('Regions');
            $city = $this->Cities->newEntity();
            $regions = $this->CitiesRegions->find('all', ['limit' => 200,'conditions'=>['CitiesRegions.city_id'=>$city_id]]);
            $results = array();
            $i=0;
            foreach($regions as $value){
                $temp = $value->region_id;
                $names = $this->Regions->find('all', ['limit' => 200,'conditions'=>['Regions.id'=>$temp]]);
                foreach($names as $name){
                    $results[$i] =  ($name); 
                    
                }$i++;
            }
                         
            $html = '<select name="region_id" onchange="getclub($(this))" class="showregion form-group">';
            $i = 1;
                    
                    $html .= '<option value="0">'.'---Select Region---'.'</option>';
                foreach($results as $region){
                    $html .= '<option value="'.$region['id'].'">'.$region['name'].'</option>';
                    
                    $i = $i+1;
                }
            if($i == 1){
                $html .= '<option>Not have city in region</option>';
            }
            $html .= '</select>';
            
            echo json_encode($html);exit;
        }
    }
    
    
    //function  unblock users...
    
    public function unlock($id=null){
        $this->loadModel('Users');
        
        if(!empty($this->Auth->user('id'))){
            
            $condition = array('Users.block'=>1, 'Users.club_id'=>$id);
            $data_block = $this->Users->getDataWhere($condition,'Users');
            $this->set('data_block',$data_block);
            
            if($this->request->is('post')){
                
                $id_unlock = $this->request->data['id'];
                $articlesTable = TableRegistry::get('Users');
                $data = $articlesTable->get($id_unlock);
                //var_dump($data);exit;
                $data->block = 0;
                $articlesTable->save($data); 
            }
        }else{
             return $this->redirect(['controller' => 'Users', 'action' => 'login', '']);
        
            
            
        }
        
        
    }
    
    //function send active for users
    
    public function active($id=null){
        $this->loadModel('Users');
        $condition = array('Users.status'=>0, 'Users.club_id'=>$id);
        $data_users = $this->Users->getDataWhere($condition,'Users');
        $this->set('data_users',$data_users);
        
        
        
        if($this->request->is('post')){
            
                    $email_user = $this->request->data['email'];
                    $username = $this->request->data['username'];
                    $code = md5($email_user.time());
                    $id_active = $this->request->data['id'];
                    
                    $articlesTable = TableRegistry::get('Users');
                    $data = $articlesTable->get($id_active);
                    //var_dump($data);exit;
                    $data->activation = $code;
                    $articlesTable->save($data);
            
                    Email::configTransport('gmail', [
                    'host' => 'smtp.gmail.com',
                    'port' => 587,
                    'username' => 'epsminhtri@gmail.com',
                    'password' => 'qekuiwbzfwdfvdsx',
                    'className' => 'Smtp',
                    'tls' => true, // <------ there it is
                    ]);
                    $email = new email();
                    $email->transport('gmail');
                    $email->to($email_user);
                    $email->from('epsminhtri@gmail.com');
                    $email->subject('Verify account'); 
                    $link = Router::Url([
                                        "controller" => "Users",
                                        "action" => "sendCodeActive",
                                        ], true);
                                        
                    $email->send('Hello ' . $username .  "\nClick this link  " .$link.'/'.$code." for complete register ");
                    $this->Flash->error(__('Send code succses, waiting users check email!'));
                    return $this->redirect($this->here);
            
        }
        
        
        
        
    }
    
    /*private function __cmp($a, $b)
        {
            return 1 * strcmp($a['register_time'], $b['register_time']);
        }*/
    //do code training counts
    public function clubsManage(){
        
        $id = $this->Auth->user('id');
        $club_id = $this->Auth->user('club_id');
        if(empty($id)){
              $this->redirect('/');  
            } 
        $this->paginate = [
        'limit'=>10,
        'contain' => ['Users']
        ];
        $role = $this->Auth->user('role');
        if($role != 0){
           $clubs = $this->paginate($this->Clubs); 
        }
                 
        $this->set(compact('clubs'));
        $this->set('_serialize', ['clubs']);
    }
    
     public function trainingCounts($id=null){
        $this->loadModel('Users');
        $this->paginate = [
        'conditions'=>[ 'Users.club_id'=>$id,'Users.status'=>1],      
       
        'order'=>['count_coming' => 'DESC'],
        'limit'=>10,
        'fields'=>['first_name','last_name','count_coming','id']
        ];
         $data_users = $this->paginate($this->Users); 
         
        $condition = array('Users.status'=>1, 'Users.club_id'=>$id,);
        $data_all = $this->Users->getDataWhereOrder($condition,'Users','count_coming')->count();
        $list = array();
        $i='';
        for($i==1; $i<= $data_all; $i++){
            $list[$i] = $i;
        }
        //var_dump($list);exit;
        $this->set('data_users',$data_users);
        $this->set('list',$list);
        $this->set('data_all',$data_all);
     }
     
     public function reports(){
        $this->loadModel('Comments');
        $club_user = $this->Auth->user('club_id');
        if($this->isAuthorizedAdmin()==1){
            $data_rep = $this->Comments->find('all');        
        }else{
            
            $data_rep = $this->Comments->find('all',['conditions'=>['Comments.club_id'=>$club_user]]);
        }
        $this->set('data_rep',$data_rep);
     }
     public function reportsAdd(){
        $this->loadModel('Comments');
        $club_user = $this->Auth->user('club_id');
        $id_user = $this->Auth->user('id');
        $this->set('club_user',$club_user);
        $this->set('id_user',$id_user);        
        if($this->request->is('post')){
            $entityTable = TableRegistry::get('Comments');
            $entity = $entityTable->newEntity();
            $entity->title = $this->request->data['title'];
            $entity->content = $this->request->data['content'];
            $entity->user_id = $id_user;
            $entity->club_id = $club_user;
            $entity->modify = date('Y-m-d');   
            $entity->created = date('Y-m-d');                        
            $entityTable->save($entity);
            $this->Flash->success('Added successfully.');
            $this->redirect('/Clubs/reports');
        }
     }
     public function reportsView($id){
        $this->loadModel('Comments');
        $data_view = $this->Comments->find('all',['conditions'=>['Comments.id'=>$id]]); 
        $this->set('data_view',$data_view);
     }
     public function reportsDelete($id = null)
    {
        $this->loadModel('Comments');
        $this->request->allowMethod(['post', 'delete']);
        $comments = $this->Comments->get($id);
        if ($this->Comments->delete($comments)) {
            $this->Flash->success(__('The comment has been deleted.'));
        } else {
            $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'reports']);
    }
     
}
