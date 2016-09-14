<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Mailer\Email;
use Cake\I18n\Time;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
            
            parent::beforeFilter($event);
            // Allow users to register and logout.
            // You should not add the "login" action to allow list. Doing so would
            // cause problems with normal functioning of AuthComponent.
            
            // only supper admin access to all
            $uses = array('Clubs');
            if($this->isAuthorizedAdmin()==1){
                $this->Auth->allow();
                
            }else if($this->isAuthorizedAdmin()==2){
                $this->Auth->allow(['view','index','logout','edit']);
                
            }
            else{
                $this->Auth->allow(['index','getclubs','getregions','logout','edit','view','resetPassword','forgotpassword','resetPasswordSent','changePassword','sendCodeActive']);
            }
            $this->Auth->allow(['register']);
            
    }
    

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $user=$this->Auth->user();
        
        if(empty($user_id)){
              $this->redirect(["controller"=>"Pages","action"=>'display', 'home']);  
            }
        $club_id = $user['club_id'];
        $coming_1 = $user['coming'];
        $user_id = $user['id'];
        //var_dump($user_id);exit;
        if($this->isAuthorizedAdmin()==1){
            $this->paginate = [
                'contain' => ['Clubs'],
                'order' => ['Users.coming'=>'desc']
                ];
        }elseif($this->isAuthorizedAdmin()==2){
            $this->paginate = [
                'contain' => ['Clubs'],
                'conditions' => ['club_id' => $club_id],
                ];
        }elseif($this->isAuthorizedAdmin()==0){
            $this->paginate = [
                'contain' => ['Clubs'],
                'conditions' => ['Users.id' => $user_id],
                ];
        }
        //var_dump($this->paginate);exit;
        //$user = $this->Auth->user('id');
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
        //var_dump($user);exit;
        
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        
        $user = $this->Users->get($id, [
                                  'contain' => ['Clubs'],
                                  ]);
        $user = $this->Users->get($id, ['contain'=>['acls'],'condition'=> ['user_id'=>$id]]);
        
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
      
        if ($this->request->is('post')) {
            $club_id = (int)$this->request->data('club_id') ;
            //var_dump($club_id);exit;
            $query= $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id,'Users.coming'=>1,'Users.block'=>0]]);        
            $number = $query->count();
            
            $this->set('number',$number);
            $query2 = $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id]]);
            $num_all=   $query2->count();        
            $this->set('num_all',$num_all);  
            //$this->loadModel('Trainings');
            $this->loadModel('Clubs');
            $clubs = $this->Clubs->find('all', ['conditions' => ['Clubs.id' => $club_id]]);
            foreach($clubs as $value){
                $max_users = $value['number_of_users'];
                $number_playing = $value['number_of_playing'];
            }
            
            
            //var_dump($max_users);exit;          
            if($number >= $max_users){
                $is_full = true;
            }else{
                $is_full = false;
            }
            $this->set('is_full', $is_full);
            $this->set('number_playing', $number_playing);
            $this->set('max_users',$max_users);
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($is_full == false) {
                $this->Users->save($user);
                $this->Flash->success(__($user->first_name . ' ' . $user->last_name . ' has been added.'));
                return $this->redirect(['action' => 'index']);
            }else{
                if($is_full == true) {
                    $this->Flash->error(__('Training full, Try today after 7 pm to attend for tomorrow'));
                    $this->Users->delete($user);
                }else{
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
                $user = $this->Users->newEntity();
                
            }
        }
        
        //var_dump($is_full);exit;
            $clubs = $this->Users->Clubs->find('list', ['limit' => 200]);
            $this->set(compact('user', 'clubs'));
            $this->set('_serialize', ['user']);
        
        
    }

    public function default_permissions($id=null){
        $this->autoRender = false;
        //$user=$this->users->get($id);
        $aclsTable = TableRegistry::get('acls');
        $acltemp=$aclsTable->newEntity();
        $acltemp->user_id = $id;
        $aclsTable->save($acltemp);
        $this->set(compact('user'));
        return $this->redirect(["controller"=>"users","action"=>"add_permissions", $id]);
    }
     public function addPermissions($id = null){

        //$acl1=$this->acls->patchEntity($acltemp, $acltemp->user_id = $id);
         //$user=$this->users->get($id);
        //$aclsTable = TableRegistry::get('acls');
        //$acltemp=$aclsTable->newEntity();
        //$acltemp->user_id = $id;
        //$aclsTable->save($acltemp);
         $user = $this->Users->get($id, ['contain'=>['acls'],'condition'=> ['user_id'=>$id]]);
        //$aclsTable = TableRegistry::get('acls');
        $acl = $this->Users->acls->findByUserId($id)->first();
         if ($this->request->is(['patch', 'post', 'put'])) {
        $acl = $this->Users->acls->patchEntity($acl, $this->request->data);
            if ($this->Users->acls->save($acl)) {
                $this->Flash->success(__($user->first_name . ' ' . $user->last_name . '\'s permissions have been saved.'));
                //return $this->redirect(["controller" => "dashboard", "action" => "index"]);
            } else {
                $this->Flash->error(__($user->first_name . ' ' . $user->last_name . '\'s permissions could not be saved. Please, try again.'));
            }

         }
         $this->set(compact('user'));
        $this->set(compact('acl'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
       // $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if($user->id == 112){
            $this->Flash->error(__('The super admin can not be deleted.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'index', '']);
        }elseif ($this->Auth->user('id')== $id) {
            $this->Flash->error(__('You are logged in with the user account you are trying to delete. The user could not be deleted.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'index', '']);
        }
        elseif ($this->Users->delete($user)) {
            $this->Flash->success(__($user->first_name . ' ' . $user->last_name . ' has been deleted.'));
        } else {
            $this->Flash->error(__($user->first_name . ' ' . $user->last_name . ' could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Users', 'action' => 'index', '']);
    }

        public function reset_redirect(){
               
        $this->Auth->Logout();
        return $this->redirect('/Users/resetPassword');
           }

     public function login()
    {   
        //show sms register end, not reset coming here!
        $h1="14";
        $strotime1 = strtotime(date("Y-m-d $h1:00:00"));
        $time1 = date("H:i:s",$strotime1);      
        $h2="18";
        $strotime2 = strtotime(date("Y-m-d $h2:00:00"));        
        $time2 = date("H:i:s",$strotime2);
        $time_now = date("H:i:s");
        $this->set('time_now',$time_now);
        $this->set('time1',$time1);
        $this->set('time2',$time2);
        
        
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            //var_dump();exit;
                if ($user && $user['status']== 1) {
                    $this->Auth->setUser($user);
                        return $this->redirect("/clubs/index");
                } elseif($user && $user['status']== 0) {
                //
                    return $this->redirect("/Users/sendCodeActive");
                }else{
                    $this->Flash->error('Your username or password is incorrect.');
                }
        }
        
    }
    
       public function users()
    {
        return $this->redirect('/Users');
    }
    
    public function changePassword()
    {
        $user = $this->request->session()->read('Auth.User');
        $user = $this->Users->get($user['id']);
        
        if($this->request->is(['patch', 'post', 'put'])){
            
            //check if te new password is equal to the confirm_password
            $user = $this->Users->patchEntity($user,$this->request->data);
                //var_dump($user['password']);exit;
            $verify = (new DefaultPasswordHasher)
            ->check($this->request->data['current_password'], $user['password']);
            //var_dump($verify);exit;
            if($verify){
            $user['password']=$this->request->data['New_password'];
                if($this->Users->save($user)){
                    $this->Flash->success(__('Your password has been changed'));
                    return $this->redirect(['action' => 'logout']);
                } else {
                    //$this->Flash->error(__('Something wrong with your new password, Please try again'));
                    
                }
            }else{
                $this->Flash->error(__('Old password is not correct! Please try again'));
            }
            
            
            
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    /*Logout*/
    public function logout()
    {
        $this->Flash->success('You are now logged out!');
        $this->Auth->Logout();
        return $this->redirect('/Users/login');
    }
    public function getregions(){
        
        if ($this->request->is('post')) {
            $this->loadModel('Regions');
            $city_id = $this->request->data['city_id'];
            $this->set('city_id',$city_id);
            
            //var_dump($regions);exit;
            $regions = $this->Regions->find('all',['conditions'=>['city_id'=>$city_id]]);
            $results = array();
            
            
            
            $html = '<select name="region" onchange="getclub($(this))" class="showregion form-group">';
            $i = 1;
                    
                    $html .= '<option value="0">'.'---Select Region---'.'</option>';
                foreach($regions as $region){
                    $html .= '<option value="'.$region['id'].'">'.$region['region_name'].'</option>';
                    
                    $i = $i+1;
                }
            if($i == 1){
                $html .= '<option>Not have club in city</option>';
            }
            $html .= '</select>';
            
            echo json_encode($html);exit;
        }
    }
    
    public function getclubs(){
        
        if ($this->request->is('post')) {
            $this->loadModel('Regions');
            $region_id = $this->request->data['region_id'];
            $temp = $this->Regions->find('all',  [
                'conditions'=>['Regions.id '=>$region_id]]);
            
            foreach($temp as $value){
                
                $city_id = $value->city_id;
            }
            //var_dump($city_id);exit;
            
            
            $clubs = $this->Clubs->find('all',['conditions'=>['city_id'=>$city_id]]);
            $results = array();
            
            
            $html = '<label>Club </label> <select name="nameclub" class="showclubname form-group">';
            $i = 1;
                
                $html .= '<option value="0">'.'---Select Club---'.'</option>';
                foreach($clubs as $club){
                    $html .= '<option value="'.$club['id'].'">'.$club['club_name'].'</option>';
                    
                    $i = $i+1;
                }
            if($i == 1){
                $html .= '<option>Not have club in region</option>';
            }
            $html .= '</select>';
            
            echo json_encode($html);exit;
        }
    }
    public function register()
    {   
        if(empty($user=$this->Auth->user())){
            $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
                //var_dump($this->request->data);exit;
                $this->request->data['club_id'] = $this->request->data['nameclub'];
                if(!empty($this->request->data['club'])){}
                $user = $this->Users->patchEntity($user, $this->request->data);      
                $res = $this->Users->find('all',  [
                'conditions'=>['Users.email '=>$user->email]])->count();
                if($res == 0 && !empty($user->username) ){
                    $code = $user->activation = md5($user->email.time());
                    //var_dump($code);exit;              
                    $this->Users->save($user);
                    
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
                    $email->to($user->email);
                    $email->from('epsminhtri@gmail.com');
                    $email->subject('Verify account'); 
                    $link = Router::Url([
                                        "controller" => "Users",
                                        "action" => "sendCodeActive",
                                        ], true);
                                        
                    $email->send('Hello ' . $user->username .  "\nClick this link  " .$link. " enter code ". $code . " to complete register ");
                    
                    return $this->redirect("/Users/sendCodeActive");
                
                }else {
                    $this->Flash->error(__('The user could not be registered. Email or username invalid. Please, try again.'));
                }
    
        }
        $clubs = $this->Users->Clubs->find('list', ['limit' => 200]);
        $cities = $this->Cities->find('all');
        //$regions = $this->Regions->find('all');
        
        
        $this->set(compact('user', 'clubs','cities'));
        $this->set('_serialize', ['user']);
        }else{
            return $this->redirect(['controller' => 'Users', 'action' => 'logout', '']);
        }
        
    }
    
    public function sendCodeActive(){
        
        if($this->request->is('post')){
            $active = $this->request->data['code'];
            if(!empty($active)){
               $usertemp = $this->Users->find('all',  [
                'conditions'=>['Users.activation'=>$active]]);
            
                foreach($usertemp as $value){
                    //var_dump($value->activation);exit;
                   if($active == $value->activation && $value->status==0){
                        foreach($usertemp as $data){
                            $articlesTable = TableRegistry::get('Users');
                            $data = $articlesTable->get($data['id']); 
                            $data->status = 1;
                            $articlesTable->save($data);
                        }
                        $this->Flash->success('completed verify!');
                        return $this->redirect('/Users/login');
                    }elseif($active == $value->activation && $value->status==1){
                        $this->Flash->error('Your account is actived!');
                    }else{
                        $this->Flash->error('Your code is not correct!');
                    }
                } 
            }else{
                $this->Flash->error('Please end code...');
            }
            
            
        }
        
        
    }



    

    // Forgot Password functions
    
    
    
    public function forgotpassword()
    {
        
        if ($this->request->is('post'))
        {
            
            $email =  $this->request->data['email'];
            
            if ( $this->validate_email($email) )
            {
                $query = $this->Users->find()->select(['email'])->where(['email ==' => $email]);
                debug($query);
                
                
                if ( empty($query) ){
                    //do something
                    
                    $salt = "498#2D83B631%3800EBD!801600D*7E3CC13";
                    
                    // Create the unique user password reset key
                    $password = hash('sha512', $salt.$userExists["email"]);
                    
                    // Create a url which we will direct them to reset their password
                    $pwrurl = "http://localhost/team301/users/ResetPassword/?q=".$password;
                    
                    // Mail them their key
                    // $mailbody = "Dear user,\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our website www.yoursitehere.com\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl . "\n\nThanks,\nThe Administration";
                    // mail($userExists["email"], "www.yoursitehere.com - Password Reset", $mailbody);
                    $message = "Your password recovery key has been sent to your e-mail address." . $pwrurl;
                }else {
                    $message = "No user with that e-mail address exists.".$email.$query;
                }
                
            }else {
                $message = "Please enter valid eamil.".$email;
            }
            
            
            $this->set('message', $message);
        }
    }
    
    public function resetPassword() {
        if ($this->request->is('post')) {
            $anUser = $this->Users
            ->find()->where(['email' => $this->request->data['email']])
            ->first();
            if (empty($anUser)) {
                $this->Flash->success(__('If you have entered a valid email then we have sent you an email which contains your new password. To login type in your username and the new password.'));
                return $this->redirect(['action' => 'login']);
            } else {
                //create new token and save it to the database
                $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $newToken = strtolower(substr(str_shuffle($char), 0, 100));
                $user = $this->Users->patchEntity($anUser, ['token' => $newToken]);
                
                $this->Users->save($user);
                //send email with the new password
                $firstName = $user->first_name;
                Email::configTransport('gmail', [
                'host' => 'smtp.gmail.com',
                'port' => 587,
                'username' => 'epsminhtri@gmail.com',
                'password' => 'qekuiwbzfwdfvdsx',
                'className' => 'Smtp',
                'tls' => true,
                
                 // <------ there it is
                ]);
                $email = new email();
                $email->transport('gmail');
                $email->to($this->request->data['email']);
                $email->from('epsminhtri@gmail.com');
                $email->subject('Change your password');
                
                $link = Router::Url([
                                    "controller" => "Users",
                                    "action" => "resetPasswordSent",
                                    ], true);
                $email->send('Hello ' . $firstName . ' ' . $user->last_name . "\n\nClick this link to complete reset password " . $link . "/$newToken");
                $this->Flash->success(__('If you have entered a valid email then we have sent you an email which contains your new password. To login type in your username and the new password.'));
                return $this->redirect(['action' => 'login']);
            }
        }
    }
    
    public function resetPasswordSent($token = null) {
        $usertemp = $this->Users->find("all", ['conditions' => ['token' => $token]])->toArray();
         //findByToken($token);
         //var_dump($token);exit;
        if (empty($usertemp)) {
            $this->Flash->error(__('Invalid reset password link. Please enter your email below to start the reset password process again.'));
            return $this->redirect(['action' => 'resetPassword']);
        }
        $user = $this->Users->get($usertemp[0]['id'], []);
        //var_dump($usertemp[0]['id']);exit;
        //$user->password = '';
        if ($this->request->is(['post','put'])){
            
            $userPatched = $this->Users->patchEntity($user, $this->request->data);
            $this->request->data['id'] = $user->id;
            $this->request->data['token'] = '';
            
            
             
            //var_dump($userPatched);exit;//['password' => $this->request->data['password']]);
            if ($this->Users->save($userPatched)) {
                $this->Flash->success(__('Password has been changed successfully.'));
                return $this->redirect('/Users/login');
            } else {
                $this->Flash->error(__('The password could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('token'));
        
        $this->set('user', $user);
    }
    
    
    



}








