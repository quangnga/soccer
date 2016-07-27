<?php
namespace App\Model\Table;

use App\Model\Entity\ContactForm;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContactForms Model
 *
 */
class ContactFormsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('contact_forms');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');


    }



    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {

        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
        $validator
            ->requirePresence('subject', 'create')
            ->notEmpty('subject','*Please enter a subject');
        $validator
            ->requirePresence('content', 'create')
            ->notEmpty('content','*Please enter content ');
        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name','*Please enter your first name');
            //->allowEmpty('email','You must enter an email address or phone number', function($context){
            //    debug($context);
            //    debug($context['data']['phone_number']);
            //    debug(empty($context['data']['phone_number']));
            //    return !empty($context['data']['phone_number']);
           // });

       //     ->requirePresence('email', function ($context) {
            //    debug($context);
            //    return empty($context['data']['phone_number']);
          //  });
          //  ->add('email','emailValid',[
            //    'rule'=>['email',true],
             //   'message'=>'Please provide a valid email'
           // ]);
          //  ->allowEmpty('phone_number','You must enter an email address or phone number', function($context){
         //   debug($context);
          //  debug($context['data']['email']);
          //  debug(empty($context['data']['email']));
         //   return !empty($context['data']['email']);
       // });
           // ->allowEmpty('phone_number',function($phone,$context=null){
           //     debug($phone);
            //    debug($context);
           //     if (!($phone['data']['email']=='')) {
           //         debug('true');
           //         return true;
           //     } else {
            //        debug('false');
           //         return false;
          //      }
          //  });
          //  ->notEmpty('phone_number','You must enter an email address or phone number', function ($context) {
            //    debug($context);
              //  debug($context['data']['email']);
              //  debug(empty($context['data']['email']));
           //     return empty($context['data']['email']);
          //  })
           // ->add('phone_number','validValue',
              //  ['rule'=>['custom','/^([0-9]+)$/i']
             //   ,'message'=>'Please enter  a valid phone number']);
         //  ->requirePresence('phone_number', function ($context) {
           //    debug($context['data']);
            //   return empty($context['data']['email']);
          // })





        return $validator;
    }
    public function checkOne($context,$data)
    {
        $email=$data['data']['email'];
        $phone=$data['data']['phone_number'];
        if (!($email=='') or  !($phone=='')) {
            debug('true');
            return true;
        } else {
            debug('false');
            return false;
        }
    }
    public function isMessage($id){
        $aclsTable = TableRegistry::get('acls');
        $acl = $aclsTable->findByUserId($id)->first();
        if($acl->messages==1){
            return true;
        }
    }




}
