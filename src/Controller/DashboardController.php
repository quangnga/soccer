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
            // Allow users to register and logout.
            // You should not add the "login" action to allow list. Doing so would
            // cause problems with normal functioning of AuthComponent.
            
            // only supper admin access to all
            if($this->isAuthorizedAdmin()==1){
                $this->Auth->allow();
                
            }else if($this->isAuthorizedAdmin()==2){
                $this->Auth->allow();
                
            }
       
            else{
                $this->Auth->allow();
            }
        }
        public function index(){
            
            
            
            $clubs=TableRegistry::get('clubs');
            
            $user=TableRegistry::get('Users');
            
            //var_dump($user);exit;
            $messages=TableRegistry::get('ContactForms');
            $countclubs=$clubs->find('all')->count();
            $countusers=$user->find('all')->count();
            $this->set('countclubs',$countclubs);
            $this->set('countusers',$countusers);
          //  $this->set('countmessages_unread',$countmessages_unread);
            //$trainings=TableRegistry::get('Trainings');
            
            $club = $this->Auth->user('club_id');
            $this->loadModel('Clubs');
            $clubTemporary = $this->Clubs->get($club);
            //var_dump($club2);exit;
            $today = strtolower(date("l"));
            //var_dump($today);exit;
            //$is_traning = false;
            if($clubTemporary[$today]== 1){
                $is_traning = true;
            }else{
                $is_traning = false;
            }
            
            $user=$this->Auth->user();
            $club_id = $user['club_id'];
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
    
    