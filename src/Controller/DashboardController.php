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

            $trainings=TableRegistry::get('Trainings');
            
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
            //
            
            $this->loadModel('Trainings');
            $this->loadModel('Users');
            $club = $this->Clubs->get($club_id, [
                'contain' => ['Trainings', 'Users']
            ]);
        
        
            $training = $this->Trainings->get($club["training_id"], [
                'contain' => []
            ]);
            $max_playing = $training['number_of_users'];
            if($number > $max_playing){
                $is_full = true;
            }else{
                $is_full = false;
            }
            //var_dump($max_playing);exit;
            
            $this->set('max_playing',$max_playing);
            $this->set('is_traning', $is_traning);
            $this->set('is_full', $is_full);
            
        }
    }
    
    