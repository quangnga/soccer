<?php
namespace App\Model\Table;

use App\Model\Entity\Acl;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Acls Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users * @property \Cake\ORM\Association\HasMany $AclUser */
class AclsTable extends Table
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

        $this->table('acls');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'id',
        ]);
       
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
            ->add('id', 'valid', ['rule' => 'numeric'])            ->allowEmpty('id', 'create');
        $validator
            ->allowEmpty('page_name');
        $validator
            ->add('childcare_centres', 'valid', ['rule' => 'boolean'])            ->requirePresence('childcare_centres', 'create')            ->notEmpty('childcare_centres');
        $validator
            ->add('daily_worksheets', 'valid', ['rule' => 'boolean'])            ->requirePresence('daily_worksheets', 'create')            ->notEmpty('daily_worksheets');
        $validator
            ->add('archive', 'valid', ['rule' => 'boolean'])            ->requirePresence('archive', 'create')            ->notEmpty('archive');
        $validator
            ->add('users', 'valid', ['rule' => 'boolean'])            ->requirePresence('users', 'create')            ->notEmpty('users');
        $validator
            ->add('messages', 'valid', ['rule' => 'boolean'])            ->requirePresence('messages', 'create')            ->notEmpty('messages');
        $validator
            ->add('content_manger', 'valid', ['rule' => 'boolean'])            ->requirePresence('content_manger', 'create')            ->notEmpty('content_manger');
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
