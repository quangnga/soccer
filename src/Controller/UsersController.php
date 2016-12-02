<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Validation\Validation;
use Cake\Mailer\Email;
use Cake\I18n\Time;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{   
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    public function beforeFilter(Event $event){
            
            parent::beforeFilter($event);
            $uses = array('Clubs');
            if($this->isAuthorizedAdmin()==1){
                $this->Auth->allow();
                
            }else if($this->isAuthorizedAdmin()==2){
                $this->Auth->allow(['view','index','logout','edit','index','getclubs','getregions','logout','edit','view','resetPassword','unlock','register','forgotpassword','login','resetPasswordSent','changePassword','sendCodeActive']);
                
            }
            else{
                $this->Auth->allow(['index','getclubs','getregions','logout','login','edit','view','resetPassword','register','forgotpassword','resetPasswordSent','changePassword','sendCodeActive']);
            }
            $this->Auth->allow(['register','forgotpassword','resetPasswordSent']);
            
    
            
    }

    public function index()
    {
        $id = $this->Auth->user('id');
        if(empty($id)){
              $this->redirect(["controller"=>"Pages","action"=>'display', 'home']);  
            }
        $user = $this->Auth->user();
        $club_id = $user['club_id'];
        $user_id = $id;

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
        $users = $this->paginate($this->Users); 
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
        $this->set('users',$users);
        
        
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
        //var_dump($user);exit;
        
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
            
            $query= $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id,'Users.coming'=>1,'Users.block'=>0]]);        
            $number = $query->count();
            $this->set('number',$number);
            
            $query2 = $this->Users->find('all', ['conditions' => ['Users.club_id' => $club_id]]);
            $num_all=   $query2->count();        
            $this->set('num_all',$num_all);  
            
            $this->loadModel('Clubs');
            $clubs = $this->Clubs->find('all', ['conditions' => ['Clubs.id' => $club_id]]);
            foreach($clubs as $value){
                $max_users = $value['number_of_users'];
                $number_playing = $value['number_of_playing'];
            }   
                      
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

        $user = $this->Users->get($id, ['contain'=>['acls'],'condition'=> ['user_id'=>$id]]);
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
            'contain' => ['Clubs']
        ]);
       // var_dump($user->club['id']);exit;
       
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
        if($user->role == 1){
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
         $notiny='';
        if ($this->request->is(['patch', 'post', 'put']))  {
        //if($this->request->is('ajax')) {    
                $user_m = $this->request->data['email'];
                $username_s = '';
                $phone = '';
                $name = '';
                $email='';
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
            //debug($this->request->data['email']);exit;
            
               if ($user && $user['status']== 1) {
                    $this->Auth->setUser($user);
                        return $this->redirect("/clubs/index");
                } elseif($user && $user['status']== 0) {
                    $this->Flash->error('Please check email to active account.');
                    
                }else{
                     
                    $notiny = 2;
                    $this->Flash->error('Your username or password is incorrect.');
                    $this->redirect("/");
                    
                    
                }
                
                
           
        }
         $this->set('notiny',$notiny);
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
        //$this->Flash->success('You are now logged out!');
        $this->Auth->Logout();
        return $this->redirect('/');
    }
    
    
    public function get_name_reg($city_id){
        $this->loadModel('cities_regions');
            //var_dump($this->loadModel('cities_regions'));exit;
            $this->loadModel('Regions');
            $this->loadModel('Cities');
            $temp = $this->cities_regions->find('all', ['limit' => 200,'conditions'=>['cities_regions.city_id'=>$city_id]]);
            $re_id = array();
            $l =0;
            foreach($temp as $db){
                    $re_id[$l] = $db['region_id']; 
                    $l++;
                }
            $re_name = array();
            $m=0;
            $n=0;
            $k=0;
            $array_reg = array();
            foreach($re_id as $value){
                $re_name[$m] = $this->Regions->find('all', ['limit' => 200,'conditions'=>['Regions.id'=>$value]]);
                $m++;
                $n=$m;
            } 
           foreach($re_name as $vl){
                foreach($vl as $reg){
                    
                   $array_reg[$k] = $reg;
                   $k++;
                }
            }
            
            return $array_reg;
    }
    
    public function getregions(){
        
        if ($this->request->is('post')) {
            
            
            $this->loadModel('cities_regions');
            //var_dump($this->loadModel('cities_regions'));exit;
            $this->loadModel('Regions');
            $this->loadModel('Cities');
            $city_id = $this->request->data['city_id'];
            $reg_name = $this->get_name_reg($city_id);
            
            $html = '<label>Region </label> <select name="" onchange="getclub($(this))" class=" form-group">';
            $i = 1;
                    
                    $html .= '<option value="0">'.'---Select Region---'.'</option>';
                foreach($reg_name as $region){
                    $html .= '<option value="'.$region['id'].'">'.$region['name'].'</option>';
                    
                    $i = $i+1;
                }
            if($i == 1){
                $html .= '<option>Not have city in region</option>';
            }
            $html .= '</select>';
            
            echo json_encode($html);exit;
        }
        
    }
    public function getclubs(){
        
        if ($this->request->is('post')) {
           
            $this->loadModel('Cities_Regions');
            $this->loadModel('Regions');
            $this->loadModel('Cities');
            $region_id = $this->request->data['region_id'];
 
            $clubs = $this->Clubs->find('all',['conditions'=>['Clubs.region_id'=>$region_id]]);
            $results = array();
            
            
            $html = '<label>Club </label> <select name="club_id"  onchange="showinput($(this))" class="showinput form-group col-md-10">';
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
                $user = $this->Users->patchEntity($user, $this->request->data);
                //var_dump($user);exit;
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Register Success! Please waiting admin send code active.'));
                    return $this->redirect("/");
                } else {
                    $this->Flash->error(__('The user could not be registered. Please, try again.'));
                }
                
            }
                $clubs = $this->Users->Clubs->find('list', ['limit' => 200]);
                $cities = $this->Cities->find('all');        
                $this->set(compact('user', 'clubs','cities'));
                $this->set('_serialize', ['user']);
            }else{
                return $this->redirect(['controller' => 'Users', 'action' => 'logout', '']);
                 
            }
            //$user = $this->Users->newEntity();
//        if ($this->request->is('post')) {
//                //var_dump($this->request->data);exit;
//                $this->request->data['club_id'] = $this->request->data['nameclub'];
//                
//                $user = $this->Users->patchEntity($user, $this->request->data);  
//                //debug($user);exit;    
//                $res = $this->Users->find('all',  [
//                'conditions'=>['Users.email '=>$user->email]])->count();
//                if($res == 0 && !empty($user->email) &&($this->Users->save($user))){
//                    $code = $user->activation = md5($user->email.time());
//                    //var_dump($code);exit;              
//                    
//                    
//                     Email::configTransport('gmail', [
//                    'host' => 'smtp.gmail.com',
//                    'port' => 587,
//                    'username' => 'epsminhtri@gmail.com',
//                    'password' => 'qekuiwbzfwdfvdsx',
//                    'className' => 'Smtp',
//                    'tls' => true, 
//                    ]);
//                    $email = new email();
//                    $email->transport('gmail');
//                    $email->to($user->email);
//                    $email->from('epsminhtri@gmail.com');
//                    $email->subject('Verify account'); 
//                    $link = Router::Url([
//                                        "controller" => "Users",
//                                        "action" => "sendCodeActive",
//                                        ], true);
//                                        
//                    $email->send('Hello ' . $user->username .  "\nClick this link  " .$link.'/'.$code." for complete register ");
//                    $this->Flash->success(__('Register Success! Please waiting admin send code active'));
//
//                    return $this->redirect("/");
//                    
//                    
//                    return $this->redirect("/Users/sendCodeActive/".$code);
//                
//                }else {
//                    $this->Flash->error(__('The user could not be registered. Email or username invalid. Please, try again.'));
//                }
//    
//        }
        
        
    }
    
    
    
    public function sendCodeActive($code=null){
        
        //$this->register();
        $usertemp = $this->Users->find("all", ['conditions' => ['activation' => $code]])->toArray();
        foreach($usertemp as $value){
            $articlesTable = TableRegistry::get('Users');
                
            $value = $articlesTable->get($value['id']); 
            $value->status = 1;
            $articlesTable->save($value);

        }
         //return $this->redirect(['controller' => 'Users', 'action' => 'login']);//exit;
        
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
                //debug($query);
                
                
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
        if (empty($usertemp)) {
            $this->Flash->error(__('Invalid reset password link. Please enter your email below to start the reset password process again.'));
            return $this->redirect(['action' => 'resetPassword']);
        }
        $user = $this->Users->get($usertemp[0]['id'], []);
        if ($this->request->is(['post','put'])){
            
            $userPatched = $this->Users->patchEntity($user, $this->request->data);
            $this->request->data['id'] = $user->id;
            $this->request->data['token'] = '';

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








