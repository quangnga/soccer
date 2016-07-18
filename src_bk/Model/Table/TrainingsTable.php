<?php
namespace App\Model\Table;

use App\Model\Entity\Training;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trainings Model
 *
 * @property \Cake\ORM\Association\HasMany $Clubs
 */
class TrainingsTable extends Table
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

        $this->table('trainings');
        $this->displayField('start_date');
        $this->primaryKey('id');

        $this->hasMany('Clubs', [
            'foreignKey' => 'training_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmpty('start_date');

        $validator
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmpty('end_date');

        $validator
            ->time('training_time')
            ->requirePresence('training_time', 'create')
            ->notEmpty('training_time');

        $validator
            ->integer('number_of_users')
            ->requirePresence('number_of_users', 'create')
            ->notEmpty('number_of_users');

        return $validator;
    }
}
