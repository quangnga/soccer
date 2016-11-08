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
             ->integer('id')
              ->allowEmpty('id', 'create');

         /**
 * $validator
 *               ->requirePresence('first_name', 'create')
 *               ->notEmpty('first_name');

 *         $validator
 *               ->requirePresence('last_name', 'create')
 *               ->notEmpty('last_name');
 */
 

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');   

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
        ->add('confirm_password','compareWith',[
              'rule'=>['compareWith','password'],
              'message'=>'The password you have typed is not the same'
              ])
        ->notEmpty('confirm_password','*Please confirm your password');
        
          $validator
                      ->requirePresence('phone_number', 'create')
                      ->notEmpty('phone_number');
 



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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['club_id'], 'Clubs'));
        return $rules;
    }
}
