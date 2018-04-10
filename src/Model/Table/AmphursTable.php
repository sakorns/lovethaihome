<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Amphurs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Geos
 * @property \Cake\ORM\Association\BelongsTo $Provinces
 *
 * @method \App\Model\Entity\Amphur get($primaryKey, $options = [])
 * @method \App\Model\Entity\Amphur newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Amphur[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Amphur|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Amphur patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Amphur[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Amphur findOrCreate($search, callable $callback = null)
 */
class AmphursTable extends Table
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

        $this->table('amphurs');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Geos', [
            'foreignKey' => 'geo_id'
        ]);
        $this->belongsTo('Provinces', [
            'foreignKey' => 'province_id'
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('amphur_code');

        $validator
            ->allowEmpty('amphur_name');

        $validator
            ->allowEmpty('postcode');

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
        $rules->add($rules->existsIn(['geo_id'], 'Geos'));
        $rules->add($rules->existsIn(['province_id'], 'Provinces'));

        return $rules;
    }
}
