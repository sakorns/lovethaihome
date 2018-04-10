<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomerAssets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Zones
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $AssetTypes
 * @property \Cake\ORM\Association\BelongsTo $Addresses
 *
 * @method \App\Model\Entity\CustomerAsset get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustomerAsset newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CustomerAsset[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustomerAsset|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomerAsset patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustomerAsset[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustomerAsset findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CustomerAssetsTable extends Table
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

        $this->table('customer_assets');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Zones', [
            'foreignKey' => 'zone_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AssetTypes', [
            'foreignKey' => 'asset_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id'
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
            ->allowEmpty('description');

        $validator
            ->allowEmpty('asset_type_des');

        $validator
            ->integer('floor_total')
            ->allowEmpty('floor_total');

        $validator
            ->integer('bedroom')
            ->allowEmpty('bedroom');

        $validator
            ->integer('bathroom')
            ->allowEmpty('bathroom');

        $validator
            ->integer('kitchen_room')
            ->allowEmpty('kitchen_room');

        $validator
            ->integer('reception_room')
            ->allowEmpty('reception_room');

        $validator
            ->integer('dining_room')
            ->allowEmpty('dining_room');

        $validator
            ->integer('maid_room')
            ->allowEmpty('maid_room');

        $validator
            ->integer('parking')
            ->allowEmpty('parking');

        $validator
            ->decimal('area_rai')
            ->allowEmpty('area_rai');

        $validator
            ->decimal('area_ngan')
            ->allowEmpty('area_ngan');

        $validator
            ->decimal('area_wah')
            ->allowEmpty('area_wah');

        $validator
            ->decimal('area_meter')
            ->allowEmpty('area_meter');

        $validator
            ->decimal('price_per_wah')
            ->allowEmpty('price_per_wah');

        $validator
            ->decimal('price_amounnt')
            ->allowEmpty('price_amounnt');

        $validator
            ->allowEmpty('isreqconsult');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->allowEmpty('budgets');

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
        $rules->add($rules->existsIn(['zone_id'], 'Zones'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['asset_type_id'], 'AssetTypes'));
        $rules->add($rules->existsIn(['address_id'], 'Addresses'));

        return $rules;
    }
}
