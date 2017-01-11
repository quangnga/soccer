<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clubs
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasOne('acls', ['foreignKey' => 'user_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clubs', [
            'foreignKey' => 'club_id',
            'joinType' => 'INNER',
            
        ]);
        $this->hasOne('Pay_table', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        
        
    }
    public function getUsers(){
        return $this->find('all',
        ['contain' => ['Clubs'],
        'order'=>['club_id'=>'asc']
        ]);
    }
    
    public function getDataWhere($where,$table){
        return $this->find('all')
                ->where($where);
    }
    public function getDataWhereOrder($where,$table,$col){
        return $this->find('all')
                ->where($where)
                ->order([$col => 'DESC']);
    }
    public function getAll($table){
        return $this->find('all',['fields'=>['username','password','status','phone_number','email','club_id','role']]);
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
                ->requirePresence('first_name', 'create')
               ->notEmpty('first_name','لقد نسيت, إدخال أسمك الأول')
        ->add('first_name',[
              
              
              'minLength'=>[
              'rule'=>['minLength',3],
              'message'=>'إسم العائلة يجب أن يجتوي على أكثر من ٣ أحرف على الأقل'
              ],
              'maxLength'=>[
              'rule'=>['maxLength',40],
              'message'=>'إسم العائلة غير صحيح الأحرف المستخدمة أكثر من ٤٠ حرف'
              ]
              ]);
        
         $validator
               ->requirePresence('last_name', 'create')
               ->notEmpty('last_name','لقد نسيت, إدخال إسم العائلة')
        ->add('last_name',[
           
              
              'minLength'=>[
              'rule'=>['minLength',3],
              'message'=>'إسم العائلة يجب أن يجتوي على أكثر من ٣ أحرف على الأقل'
              ],
              'maxLength'=>[
              'rule'=>['maxLength',40],
              'message'=>'إسم العائلة غير صحيح الأحرف المستخدمة أكثر من ٤٠ حرف'
              ]
              ]);
        
        
        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email','لقد نسيت, أن تدخل إيميل. مثال: example@hotmail.com');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password','أدخل كلمة السر')
        ->add('password','length',[
              'rule'=>['minLength',8],
              'message'=>'كلمة السر, يجب أن تكون مكونة من ٨ احرف وأرقام.'
              ]);
        

        $validator
        ->add('confirm_password','compareWith',[
              'rule'=>['compareWith','password'],
              'message'=>'خطأ, كلمة السر مختلفة يجب ادخال كلمة سر واحدة'
              ])
        ->notEmpty('confirm_password','الرجاء تأكيد إدخال كلمة السر');
        
          $validator
                      ->requirePresence('phone_number', 'create')
                      ->notEmpty('phone_number','لقد نسيت, إدخال رقم جوالك');
 



        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['phone_number']));
        $rules->add($rules->existsIn(['club_id'], 'Clubs'));
        return $rules;
    }
}
