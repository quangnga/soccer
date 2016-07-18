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
            
            // only admin access to all
            if($this->isAuthorizedAdmin()){
                $this->Auth->allow();
                
                
            }else{
                $this->Auth->allow(['index']);
                
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
            $trainings=TableRegistry::get('Trainings');
            
            $club = $this->Auth->user('club_id');
            $this->loadModel('Clubs');
            $clubTemporary = $this->Clubs->get($club);
            //var_dump($club2);exit;
            $today = strtolower(date("l"));
            
            //$is_traning = false;
            if($clubTemporary[$today]== 1){
                $is_traning = true;
            }else{
                $is_traning = false;
            }
            //var_dump($is_traning);exit;
            $this->set('is_traning', $is_traning);
            
        }
    }
    
    