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
                        'username' => 'username',
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
        
        // Allow the displat action so out pages controller
        // contines to work
        $this->Auth->allow(['display']);

    }
    
    public function beforeFilter(Event $event)
    {
        //$this->Auth->allow(['add']);
        
        $user=$this->Auth->user();//Gets currently logged in user
      //  debug($user);
        $first_name=$user['first_name'];//Gets the first name of the currently logged in user
        $last_name=$user['last_name'];//Gets the last name of the currently logged in user
        $id = $user['id'];
        $is_admin = $user['role'];
		$club_id = $user['club_id'];
		$username=$user['username'];
        $this->set('first_name',$first_name);//Sets the first name of the currently logged in user
        $this->set('last_name',$last_name);//Sets the last name of the currently logged in user
        $this->set('id',$id);
        $this->set('is_admin',$is_admin);
        $this->set('club_id',$club_id);
        $this->set('username',$username);
        $time = Time::now();
        $this->set('time',$time->i18nFormat(\IntlDateFormatter::FULL));
        
       //$coming=$user['coming'];
       //var_dump($user);exit;
       //$this->set('coming',$coming);
       //$this->updateComing();
       $this->resetComing();
       $this->getCity();
       $this->getComing();
       $this->getComingYesterday();
       $clubByuser = $this->Auth->user('club_id');
       $this->set('clubByuser',$clubByuser); 
       
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
                }
        }
    }
}
    public function getCity(){
        
        $this->loadModel('Clubs');
        $this->loadModel('Cities');
        $datas = $this->Cities->find('all');
        $datas2 = $this->Clubs->find('all');
        //$data = $datas->city_name;
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
        $user = $this->Users->find('all');
        $today = strtolower(date("l"));
        
        $time_now = strtotime(date('H:i'));
        //var_dump(date('H:i'));exit;
        $time_reset = strtotime("5:14");// change time here and change date_reset in table users < today
        
        
        foreach($user as $value){
            $articlesTable = TableRegistry::get('Users');        
            $value = $articlesTable->get($value['id']);
            if($value->coming_date!=NULL){
                $get_comings = json_decode($value->coming_date);
                $array_comings =get_object_vars($get_comings); 
                
                if(($time_now >= $time_reset)&&(strtotime($date_data)>strtotime($value->date_reset))){
                
                    $value->coming = 0;
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
    
    
    public function getComingYesterday(){
        $this->loadModel('Users');
        $date_data = date("Y-m-d");
        $user = $this->Users->find('all');
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
        
        
    
   
}