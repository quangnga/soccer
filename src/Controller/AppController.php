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
        //var_dump($now);exit;
       $coming=$user['coming'];
       $this->set('coming',$coming);
       $this->updateComing();
       $this->resetComing();
       $this->getCity();
       $clubByuser = $this->Auth->user('club_id');
       $this->set('clubByuser',$clubByuser);
       
       
       
       
       //var_dump($club);exit;
       
       
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
    // reset coming by time if call function updataComing in beforeFillter
    public function updateComing(){
        $this->loadModel('Users');
        $hour = "23";// time reset not timezone;
        $h= date("H:i:s");
        $strotime = strtotime(date("Y-m-d $hour:59:59"));
        $date = date("Y-m-d H:i:s",$strotime);
        
        $date1 = date("Y-m-d H:i:s");
        $date_data = date("Y-m-d");
        //var_dump($date);exit;
        if($date1 > $date){
            $datas = $this->Users->find('all', [
                'conditions'=>['Users.date_reset <'=>$date_data]
            ]);
            foreach($datas as $data){
                $articlesTable = TableRegistry::get('Users');
                $data = $articlesTable->get($data['id']); // Return data with id 
                $data->coming = 0;
                $data->date_reset = $date;
                $articlesTable->save($data);
            }
        }
    }
    /*public function resetTraining(){
        $this->loadModel('Clubs'); 
        $w= date("W");
        $today = strtolower(date("l"));
        //$day = array('monday','tuesday','wendesday','thursday','friday','saturday','sunday');
        $datas = $this->Clubs->find('all');
            
        foreach($datas as $data){
            //var_dump($data->week );exit;
            if($data->week == 52 && $w==1){
                $articlesTable = TableRegistry::get('Clubs');
                $data = $articlesTable->get($data['id']); // Return data with id 
                $data->week = 1;
                $data->reset_training = 0;
                $articlesTable->save($data);
            }
            if(($w > $data->week ) &&($data->reset_training == 1)){
                $articlesTable = TableRegistry::get('Clubs');
                $data = $articlesTable->get($data['id']); // Return data with id 
                $data->reset_training = 0;
                $data->week = $w;
                $articlesTable->save($data);
            }
            if(($data->reset_training == 0) && $w == $data->week ){
                $articlesTable = TableRegistry::get('Clubs');
                $data = $articlesTable->get($data['id']); // Return data with id 
                $data->reset_training = 1;

                if($data->reset_training == 1){
                    foreach($day as $value){
                        //var_dump($value);exit;
                       $data->$value = 0; 
                    }
                    $data->reset_training = 1;      
                }
                //$data->date_reset = $date;
                $articlesTable->save($data);
        }
        
        
        
    }      
       
    }*/
    public function resetComing(){
        $this->loadModel('Users');
        $w= date("W");
        $datas = $this->Users->find('all');
        //var_dump($datas);exit;
        foreach($datas as $data){
            //var_dump($data->week );exit;
            //set week value for new year
            if($data->week == 52 && $w==1){
                $articlesTable = TableRegistry::get('Users');
                $data = $articlesTable->get($data['id']); // Return data with id 
                $data->week = 1;
                $data->reset_coming = 0;
                $articlesTable->save($data);
            }
            
            if(($w > $data->week ) &&($data->reset_coming == 1)){
                $articlesTable = TableRegistry::get('Users');
                $data = $articlesTable->get($data['id']); // Return data with id 
                $data->reset_coming = 0;
                $data->week = $w;
                $articlesTable->save($data);
            }
            //var_dump($data->reset_coming);exit;
            if((($data->reset_coming == 0) && ($w == $data->week))||($data->reset_coming == 0) ){
                
                $articlesTable = TableRegistry::get('Users');
                $data = $articlesTable->get($data['id']); // Return data with id 
                $data->reset_coming = 1;

                if($data->reset_coming == 1){
                    
                    $temp = array('monday'=>0,'tuesday'=>0,'wendesday'=>0,'thursday'=>0,'friday'=>0,'saturday'=>0,'sunday'=>0);
                    $data->coming_date = json_encode($temp) ;
                    $data->reset_coming = 1;
                    //var_dump($data->coming_date);exit;      
                }
                //$data->date_reset = $date;
                $articlesTable->save($data);
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
        //var_dump($d);exit;    
        
    }
    
        
        
    
   
}