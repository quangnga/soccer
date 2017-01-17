<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\I18n\Number;
use Cake\Network\Email\Email;
use Cake\Routing\Router;

/**
 * Regions Controller
 *
 * @property \App\Model\Table\RegionsTable $Regions
 */
class PaymentsController extends AppController
{
    public function beforeFilter(Event $event)
        {
            
            parent::beforeFilter($event);

            if(($this->isAuthorizedAdmin()==1)||($this->isAuthorizedAdmin()==2)){
                $this->Auth->allow();
                
            }else{
                $this->Auth->deny();
            }
       
            
            
            
            
        }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->loadModel('Pay_table');
        $payments = $this->paginate($this->Pay_table);
        //var_dump($payments);exit;   
        $this->set(compact('payments'));
        $this->set('_serialize', ['payments']);
       
    }

    /**
     * View method
     *
     * @param string|null $id Region id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {   
        
       
        $this->loadModel('Pay_table');
        $this->loadModel('ListPay');
        $this->loadModel('Users');
        $club_user = $this->Auth->user('club_id');
        $payments = $this->Pay_table->find('all',['conditions'=>['Pay_table.id'=>$id],'fields'=>['month']]); 
        if($this->isAuthorizedAdmin()==1){
            $this->paginate = array(
                                'limit' => 10,
                                'conditions'=>array('ListPay.pay_table_id'=>$id),
                             );
          $data_users = $this->paginate('ListPay');        
        }
        if($this->isAuthorizedAdmin()==2){
            
            $this->paginate = array(
                                'limit' => 10,
                                'conditions'=>array('ListPay.pay_table_id'=>$id,'ListPay.club_id'=>$club_user),
                             );
          $data_users = $this->paginate('ListPay');   
            
        }
        foreach($payments as $payment){
            $this->set('payment', $payment);
        }
        $this->set('data_users', $data_users);
        
        
        
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $this->loadModel('Pay_table');
        $this->loadModel('ListPay');
       
        
        
        $payments = $this->Pay_table->newEntity();
        $temp='';
        
        
        if ($this->request->is('post')) {
            //var_dump($this->request->data['key_random']);exit;
            $data_payment = $this->Pay_table->find('all', ['fields'=>['created']]);
            foreach($data_payment as $db){
                $month_cre = date('Y-m', strtotime($db['created']));
                $temp1 = date('m', strtotime($db['created']));
                if((strtotime($month_cre)==strtotime(date('Y-m')))&&($temp1 == $this->request->data['month'])){
                    $temp = 1;
                    break;
                }
            }
            if($temp==0){
                $entityTable = TableRegistry::get('Pay_table');
                $entity = $entityTable->newEntity();
                $entity->month = $this->request->data['month'];
                $entity->created = date('Y-m-d');                        
                $entityTable->save($entity);
                $id_pay = $entity->id;
                //var_dump($id);exit;
                $this->loadModel('ListPay');
                $this->loadModel('Users');
                $data_users = $this->Users->find('all', ['fields'=>['first_name','last_name','club_id','id','paid_stt','date_paid'],'conditions'=>['Users.status'=>'1','Users.block'=>'0']]);
                
                foreach($data_users as $data){
                    $entity2 = TableRegistry::get('ListPay');
                    $value = $entity2->newEntity();
                    $value->user_id = $data['id'];
                    $value->club_id = $data['club_id'];
                    $value->pay_table_id = $id_pay;
                    $value->created_paid = date('Y-m-d');
                    $value->paid_stt = $data['paid_stt'];
                    $value->name = $data['first_name'].' '. $data['last_name'];
                    $value->created = date('Y-m-d H:i:s');   
                    $entity2->save($value);
                }
                if($entityTable->save($entity)) {
                    $this->Flash->success('Added successfully.');
                    $this->redirect('/Payments/index');
                    
                } else {
                    $this->Flash->error('Error!.');
                }  
            }else{
                $this->Flash->error('The month exist!.');
                $this->redirect('/Payments/index');
            }
            
            
        }
        
        $this->set(compact('payments'));
        $this->set('_serialize', ['payments']);
    }

    

    /**
     * Delete method
     *
     * @param string|null $id Region id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadModel('Pay_table');
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('ListPay');

        $payments = $this->Pay_table->get($id);
        if ($this->Pay_table->delete($payments)) {
            $data_list = $this->ListPay->find('all', ['fields'=>['id','pay_table_id'],'conditions'=>['ListPay.pay_table_id'=>$id]]);
            foreach ($data_list as $key => $value) {
                $item_pay = $this->ListPay->get($value['id']);
                $this->ListPay->delete($item_pay);
            }
            $this->Flash->success(__('The month has been deleted.'));
        } else {

            $this->Flash->error(__('The month could not be deleted. Please, try again.'));

        }

        return $this->redirect(['action' => 'index']);
    }
}
