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
use Cake\Event\Event;

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
    {
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
        $id=$user['id'];
        $this->set('first_name',$first_name);//Sets the first name of the currently logged in user
        $this->set('last_name',$last_name);//Sets the last name of the currently logged in user
        $this->set('id',$id);


    }
    public function isAuthorized($user)
{
         if($this->Auth->user('id')== 112){
                return true;
            } else{
        
        return false;
         
            }
    }
}