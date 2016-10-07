<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CitiesRegions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cities
 * @property \Cake\ORM\Association\BelongsTo $Regions
 *
 * @method \App\Model\Entity\CitiesRegion get($primaryKey, $options = [])
 * @method \App\Model\Entity\CitiesRegion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CitiesRegion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CitiesRegion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CitiesRegion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CitiesRegion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CitiesRegion findOrCreate($search, callable $callback = null)
 */
class CitiesRegionsTable extends Table
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

        $this->table('cities_regions');
        $this->displayField('city_id');
        $this->primaryKey(['city_id', 'region_id']);

        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['city_id'], 'Cities'));
        $rules->add($rules->existsIn(['region_id'], 'Regions'));

        return $rules;
    }
}
