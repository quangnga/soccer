<?php
    namespace App\Controller;
    use Cake\Event\Event;
    use App\Controller\AppController;
    use Cake\ORM\TableRegistry;
    use Cake\Network\Exception\NotFoundException;
    /**
     * Created by PhpStorm.
     * User: marci
     * Date: 15/12/2015
     * Time: 2:18 PM
     */
    class DashboardController extends AppController
    {
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
            
            $id = $this->Auth->user('id');
            if(empty($id)){
              return $this->redirect('/');  
            }
            
        }
        public function index(){
            
            
            $id = $this->Auth->user('id');
            if(empty($id)){
              return $this->redirect("/");  
            }
            $clubs=TableRegistry::get('clubs');
            
            $user=TableRegistry::get('Users');
            
            //var_dump($user);exit;
            $messages=TableRegistry::get('ContactForms');
            $countclubs=$clubs->find('all')->count();
            $countusers=$user->find('all')->count();
            $this->set('countclubs',$countclubs);
            $this->set('countusers',$countusers);
            $club = $this->Auth->user('club_id');
            $this->loadModel('Clubs');
            $clubTemporary = $this->Clubs->get($club);
            //var_dump($club2);exit;
            $today = strtolower(date("l"));
            if($clubTemporary[$today]== 1){
                $is_traning = true;
            }else{
                $is_traning = false;
            }
            
            $user_id=$this->Auth->user('id');
            $db= $this->Users->find('all', ['conditions' => ['Users.id' => $user_id]]);
            foreach($db as $value){
                $coming_user = $value->coming;
            }
            $this->set('coming_user',$coming_user);
            //var_dump($user);exit;
            $club_id = $this->Auth->user('club_id');;
            $query= $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id,'Users.coming'=>1,'Users.block'=>0]]);        
            $number = $query->count();          
            $this->loadModel('Users');
            $club = $this->Clubs->get($club_id, [
                'contain' => ['Users']
            ]); 
            
            $max_users = $club['number_of_users'];
            //var_dump($max_users);exit;
            if($number >= $max_users){
                $is_full = true;
            }else{
                $is_full = false;
            }
            //var_dump($max_playing);exit;
            $is_admin=$this->Auth->user('role');
            $this->set('is_admin',$is_admin);
            $this->set('max_users',$max_users);
            $this->set('is_traning', $is_traning);
            $this->set('is_full', $is_full);
            
            
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
            
           // var_dump($time_close);exit;
                
        }
    }
    
    