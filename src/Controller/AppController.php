<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\I18n\Time;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */

    

    public function initialize()
    {   parent::initialize(); 
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' =>'email',
                        'password' => 'password'
                        ]
                    ]
                ],
                'loginRedirect' => [
                'controller' => 'Clubs',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
                ]
            ]);
        
        $this->Auth->allow(['display',
                'home']);

    }
    
    
    public function beforeFilter(Event $event)
    {
        
        $user=$this->Auth->user();//Gets currently logged in user
        $first_name=$user['first_name'];//Gets the first name of the currently logged in user
        $last_name=$user['last_name'];//Gets the last name of the currently logged in user
        $id = $user['id'];
        $is_admin = $user['role'];
		$club_id = $user['club_id'];
		//$username=$user['username'];
        
        $this->set('first_name',$first_name);//Sets the first name of the currently logged in user
        $this->set('last_name',$last_name);//Sets the last name of the currently logged in user
        $this->set('id',$id);
        $this->set('is_admin',$is_admin);
        $this->set('club_id',$club_id);
        //$this->set('username',$username);
        $time = Time::now();
        $this->set('time',$time->i18nFormat(\IntlDateFormatter::FULL));
        $this->resetComment();
        $this->resetForDate();
        
        $this->resetComing();
        $this->getCity();
        $this->getComing();
        $this->getComingYesterday();
        $clubByuser = $this->Auth->user('club_id');
        $this->set('clubByuser',$clubByuser); 
        $this->resetPayment();
       
    }
    
    const ERROR = 'error';
    const NOTICE = 'notice';
    const SUCCESS = 'success';

    /**
     * Array of allowed classes
     * @var array
     */
    public static $flashClasses = array(
        self::ERROR,
        self::NOTICE,
        self::SUCCESS
    );

    /**
     * @param string $message
     * @param null $type
     */
    public function setFlash($message, $type = null)
    {
        if (in_array($type, self::$flashClasses)) {
            $class = $type;
        } else {
            $class = self::NOTICE;
        }

        $this->Flash->turboTribble($message, [
            'key' => 'tribble',
            'params' => [
                'class' => 'tt-'. $class
            ]
        ]);
    }
    
    public function isAuthorizedAdmin()
    {
        $user=$this->Auth->user();
        if(isset($user)){
            if($user['role']==2 ){
                return 2;
            }
        else if($user['role']==1 ){
            return 1;
        }
            return 0;
        }
        return false;
         
    }
    
    public function resetComing(){
        $this->loadModel('Users');
        $current_week= date("W");
        $datas = $this->Users->find('all');
        $temp_coming= array('lastsunday'=>0,'now'=>0);
        
        foreach($datas as $data){
            //var_dump(json_encode($temp_coming));exit;
            if(empty($data->coming_last_day)){
                $articlesTable = TableRegistry::get('Users');
                $data = $articlesTable->get($data['id']); // Return data with id 
                $data->coming_last_day = json_encode($temp_coming);
                $data->week = $current_week;
                $articlesTable->save($data);
               
            }
            if($data->week == 52 && $current_week==1){
                $articlesTable = TableRegistry::get('Users');
                $data = $articlesTable->get($data['id']); // Return data with id 
                $data->week = 1;
                $data->reset_coming = 0;
                $articlesTable->save($data);
            }
            
            if(($current_week > $data->week ) &&($data->reset_coming == 1)){
                $articlesTable = TableRegistry::get('Users');
                $data = $articlesTable->get($data['id']);
                $data->reset_coming = 0;
                $data->week = $current_week;
                $articlesTable->save($data);
            }
            if((($data->reset_coming == 0) && ($current_week == $data->week))||($data->reset_coming == 0) ){
                
                $articlesTable = TableRegistry::get('Users');
                $data = $articlesTable->get($data['id']);
                $data->reset_coming = 1;
                if($data->coming_date != NULL){
                    $temp_data = json_decode($data->coming_date);
                    $array_data = get_object_vars($temp_data);
                    //debug($data);exit;
                    
    
                    if($data->reset_coming == 1){
                        $temp_coming['lastsunday'] = $array_data['sunday'];
                        $temp_coming['now'] = 0;
                        
                        $data->coming_last_day = json_encode($temp_coming);
                        $temp = array('monday'=>0,'tuesday'=>0,'wednesday'=>0,'thursday'=>0,'friday'=>0,'saturday'=>0,'sunday'=>0);
                        $data->coming_date = json_encode($temp) ;
                        //$data->reset_coming = 1;
                              
                    }
                    
                    $articlesTable->save($data);
                }else{
                    
                    $temp = array('monday'=>0,'tuesday'=>0,'wednesday'=>0,'thursday'=>0,'friday'=>0,'saturday'=>0,'sunday'=>0);
                    $data->coming_date = json_encode($temp) ;
                    $articlesTable->save($data);
                }
        }
    }
}
    public function getCity(){
        
        $this->loadModel('Clubs');
        $this->loadModel('Cities');
        $datas = $this->Cities->find('all');
        $datas2 = $this->Clubs->find('all');

        foreach($datas as $data){
           $id_city=$data->club_id;
           $id=$data->id;
           foreach($datas2 as $value){
              $id_club=$value->id;
              
              if($id_club==$id_city){
                $articlesTable = TableRegistry::get('Clubs');
                $value = $articlesTable->get($value['id']); // Return data with id 
                $value->city_id = $id;
                $articlesTable->save($value);
              }  
           }
        }
   
        
    }
    public function getComing(){
        $this->loadModel('Users');
        $date_data = date("Y-m-d");
        
        
        $today = strtolower(date("l"));
        
        $time_now = strtotime(date('H:i'));
       
        
        $clubs = $this->Clubs->find('all',['fields'=>['id','time_reset']]);
        foreach($clubs as $club){
            $temp = strtotime($club['time_reset']);
            $temp2 = date('H:i',$temp);
            $time_reset = strtotime($temp2);// change time here and change date_reset in table users < today
            $user = $this->Users->find('all',['conditions'=>['Users.club_id'=>$club['id']],'fields'=>['id','coming_date','coming','date_reset']]);
            //var_dump($name2);exit;
            foreach($user as $value){
                $articlesTable = TableRegistry::get('Users');        
                $value = $articlesTable->get($value['id']);
                if($value->coming_date!=NULL){
                    //var_dump($time_now);exit;
                    $get_comings = json_decode($value->coming_date);
                    $array_comings =get_object_vars($get_comings); 
                    
                    if((strtotime($date_data)>strtotime($value->date_reset))){
                    
                        $value->coming = 0;
                        $value->reset_everyday = 0;
                        foreach($array_comings as $key => $get_coming){               
                        
                            if($key==$today ){
                                $array_comings["$key"] = 0;                     
                            }                   
                        }
                        $temp_coming= json_encode($array_comings);
                        $value->coming_date = $temp_coming;
                        $articlesTable->save($value);
                        
                    }// reset comings by time;
                    $get_coming_new = json_decode($value->coming_date);
                    if(!empty($get_coming_new)){ 
                        
                        $coming = $value->coming;
                        foreach($get_coming_new as $key => $get_coming){               
                            if($key==$today ){
                                $data_coming = $get_coming; 
                                $value->coming = $data_coming;
                                $value->date_reset = $date_data;
                                $articlesTable->save($value);                        
                            }                   
                        }
                    
                    }else{
                        $temp = array('monday'=>0,'tuesday'=>0,'wednesday'=>0,'thursday'=>0,'friday'=>0,'saturday'=>0,'sunday'=>0);
                        $value->coming_date = json_encode($temp);
                        $articlesTable->save($value);
                    }// get coming from coming_date;
                    json_encode($get_comings);
                }
        }
        }
        
        
        
        
    }
    
    public function resetForDate(){
        //var_dump(date("H:i"));exit;
        $this->loadModel('Users');
        $this->loadModel('Clubs');
        $today = strtolower(date("l"));
         $clubs = $this->Clubs->find('all',['fields'=>['id','time_reset']]);
         $day_now = strtotime(date('Y-m-d H:i:s'));
         foreach($clubs as $club){
            $temp = strtotime($club['time_reset']);
            $temp2 = date('H:i',$temp);
            $time_reset = strtotime($temp2);// change time here and change date_reset in table users < today
            $user = $this->Users->find('all',['conditions'=>['Users.club_id'=>$club['id']],'fields'=>['id','register_time','reset_everyday','coming_date','time_reset_evr','coming','date_reset']]);
            //var_dump($name2);exit;
            foreach($user as $value){
               
                $date_user =  strtotime(date('Y-m-d H:i',strtotime($value['time_reset_evr'])));
                 if(($day_now >= $date_user)&&(($value['reset_everyday'])==$time_reset)){
                        $articlesTable = TableRegistry::get('Users');        
                        $value = $articlesTable->get($value['id']);
                        $value->time_reset_evr = date("Y-m-d", strtotime('tomorrow')).' '.date("H:i:s",$value['reset_everyday']);
                        $get_comings = json_decode($value->coming_date);
                        $array_comings =get_object_vars($get_comings); 
                        $value->coming = 0;
                        foreach($array_comings as $key => $get_coming){               
                        
                            if($key==$today ){
                                $array_comings["$key"] = 0;                     
                            }                   
                        }
                        $temp_coming= json_encode($array_comings);
                        $value->coming_date = $temp_coming;
                        $articlesTable->save($value);
                        
                 }

            }
         }
    }
    
    
    public function getComingYesterday(){
        $this->loadModel('Users');
        $this->loadModel('Clubs');
        $date_data = date("Y-m-d");
        $user = $this->Users->find('all');
        $club = $this->Users->Clubs->find('all');
       
        $today = strtolower(date("l"));
        
        switch ($today) {
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
        foreach($user as $value){
            $articlesTable = TableRegistry::get('Users');        
            $value = $articlesTable->get($value['id']);
            
            if($value->coming_date!=NULL){
                $get_comings = json_decode($value->coming_date);
                $array_comings =get_object_vars($get_comings);
                
                $temp_json = json_decode($value->coming_last_day);
                $array_temp_json =get_object_vars($temp_json);
                
                $temp_last_coming = $array_comings[$yesterday]; 
                $value->coming_yesterday = $array_temp_json['now'];
                if($today=='monday'){
                    $array_temp_json['now'] = $array_temp_json['lastsunday']; 
                }else{
                    $array_temp_json['now'] = $temp_last_coming;
                }
                $value->coming_last_day = json_encode($array_temp_json);
                
                $articlesTable->save($value);
            //var_dump($temp_last_coming);exit; 
            }
        }
        
    }
    
    public function resetComment(){
        $this->loadModel('Users');
        $date_reset = strtotime(date("Y-m-d"));
        $user = $this->Users->find('all', ['fields'=>['id','date_reset','comment']]);
        foreach($user as $value){
            //var_dump($value['comment']);
            $date_user = strtotime($value['date_reset']);
            if($date_reset > $date_user){
                 $articlesTable = TableRegistry::get('Users');        
                 $value = $articlesTable->get($value['id']);
                 $value->comment = '';
                 $articlesTable->save($value);
            }
            
           
        }
        
        
        
    }
    
    
    public function resetPayment(){
        $this->loadModel('Users');
        $month_now = date("m");

        $users = $this->Users->find('all', ['fields'=>['id','paid_stt','date_paid']]);
        
        foreach($users as $user){
            
            $month = date('m', strtotime($user['date_paid']));
            $year = date('Y', strtotime($user['date_paid']));
            
            if(($year==date('Y')&&($month<date('m')))||($year < date('Y')&&($month>date('m')))){
                $articlesTable = TableRegistry::get('Users');        
                $value = $articlesTable->get($user['id']);
                $value->paid_stt = 0;                
                $value->date_paid = date('Y-m-d');   
                $articlesTable->save($value); 
            }
        }
    }
        
    
   
}