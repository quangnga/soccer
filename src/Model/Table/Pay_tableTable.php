<?php
namespace App\Model\Table;

use App\Model\Entity\Pay_table;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Acls Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users * @property \Cake\ORM\Association\HasMany $AclUser */
class Pay_table extends Table
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

        $this->table('pay_table');
        $this->displayField('id');
        $this->primaryKey('id');
       
        
        
       
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
       
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
     
     //public function getall(){
//        return $this->find('all',['fields'=>['paid_stt']]);
//     }
     
    public function buildRules(RulesChecker $rules)
    {
        //$rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
