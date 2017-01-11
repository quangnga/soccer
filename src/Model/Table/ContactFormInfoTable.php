<?php
/**
 * Created by PhpStorm.
 * User: marci
 * Date: 28/12/2015
 * Time: 12:11 AM
 */

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ContactFormInfoTable extends Table
{

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
        ->notEmpty('subject','لو سمحت, أدخل موضوع الرسالة');
        $validator
        ->requirePresence('content', 'create')
        ->notEmpty('content','لو سمحت أدخل الرسالة');
        $validator
        ->requirePresence('first_name', 'create')
        ->notEmpty('first_name','لو سمحت أدخل إسمك الأول');
        
        $validator
        ->requirePresence('phone_number', 'create')
        ->notEmpty('phone_number','لو سمحت أدخل رقم جوالك');

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
}
    
