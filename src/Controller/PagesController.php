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

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Validation\Validation;
use Cake\Mailer\Email;
use Cake\I18n\Time;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */

class PagesController extends AppController
{
    
    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
     
     public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        
            $this->Auth->allow();
    }
     
     
    public function display()
    {
        
        
        $path = func_get_args();
        
        $count = count($path);
        $this->set('path',$path);
        
        
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
        $notiny = '';
        if($this->request->is(['patch', 'post', 'put'])){
            $user = $this->loadModel('Users');
           
               
            $user_m = $this->request->data['email'];
            $pass =  $this->request->data['password'];
            $username_s = '';
            $phone = '';
            $name = '';
            $email='';
            
            if(!empty($user_m)&!empty($pass)){
                if(Validation::email($user_m)){
                    $find_by_email = $this->Users->find('all',['conditions'=>['Users.email'=>$user_m],'fields'=>'email'] );
                        foreach($find_by_email as $db){
                        $email = $db['email'];
                    }
                    $username_s = $email;
                }else{
                    $find_by_phone = $this->Users->find('all',['conditions'=>['Users.phone_number'=>(int)$user_m],'fields'=>'email'] );
                        foreach($find_by_phone as $dbs){
                            $phone = $dbs['email'];
                        }
                    if(!empty($phone)){
                        
                        $username_s = $phone;
                        
                    }else{
                        $find_by_name = $this->Users->find('all',['conditions'=>['Users.username'=>$user_m],'fields'=>'email'] );
                        foreach($find_by_name as $dbs){
                            $name = $dbs['email'];
                        }
                        $username_s = $name;
                    }         
                }
                 
           
            $this->request->data['email'] = $username_s;
            
            $user = $this->Auth->identify();
            
               if ($user && $user['status']== 1) {
                    $this->Auth->setUser($user);
                        return $this->redirect("/clubs/index");
                } elseif($user && $user['status']== 0) {
                    echo "<script>alert('Please check email to active account.');
                   
                        window.location.assign(''); 
                        
                    </script>"; 
                    
                    
                }else{
                    
                    
                    
                    echo "<script>alert('Your username or password is incorrect.');
                   
                        window.location.assign(''); 
                        
                    </script>"; 
                    
                    
                    
                }
                
                
           
            }else{
                    echo "<script>alert('Your username or password is incorrect.');
                   
                        window.location.assign(''); 
                        
                    </script>"; 
                 
            }
            
        }
        


       
    }
    public function addsms(){
        //
        $this->loadModel('ContactForms');
        if($this->request->is('post')){
            //var_dump(111);exit;
            $user = $this->ContactForms->newEntity();
            if($this->request->data['phone_number']==''and $this->request->data['email']=='' ){
                 echo "<script>alert('Please enter a phone number or email.');
                  </script>"; 
                
                //$this->Flash->error(__('Please enter a phone number or email'));
                 //return $this->redirect("/");
            }else {
                $user = $this->ContactForms->patchEntity($user, $this->request->data);
                if ($this->ContactForms->save($user)) {
                    echo "<script> alert('Contact form submitted!');
                        window.location.assign(''); 
                        
                    </script>"; 
                    //$this->Flash->success(__('Contact form submitted!.'));

                } else {
                    echo "<script>alert('The contact form could not be submitted. Please, try again.');       
                    </script>";
                
                    // return $this->redirect("/");
                    //$this->Flash->error(__('The contact form could not be submitted. Please, try again.'));
                }
            }
            return $this->redirect("/");
        }
    }
    
   
        
}
