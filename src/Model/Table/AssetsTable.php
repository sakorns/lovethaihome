<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Assets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $AssetTypes
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Addresses
 * @property \Cake\ORM\Association\BelongsTo $Zones
 * @property \Cake\ORM\Association\HasMany $AssetImages
 * @property \Cake\ORM\Association\HasMany $AssetOptions
 *
 * @method \App\Model\Entity\Asset get($primaryKey, $options = [])
 * @method \App\Model\Entity\Asset newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Asset[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Asset|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Asset patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Asset[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Asset findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AssetsTable extends Table
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

        $this->table('assets');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('AssetTypes', [
            'foreignKey' => 'asset_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id'
        ]);
        $this->belongsTo('Zones', [
            'foreignKey' => 'zone_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('AssetImages', [
            'foreignKey' => 'asset_id'
        ]);
        $this->hasMany('AssetOptions', [
            'foreignKey' => 'asset_id'
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
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('asset_type_des');

        $validator
            ->allowEmpty('createdby');

        $validator
            ->decimal('floor_total')
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
            ->decimal('area_width')
            ->allowEmpty('area_width');

        $validator
            ->decimal('area_long')
            ->allowEmpty('area_long');

        $validator
            ->decimal('price_per_wah')
            ->allowEmpty('price_per_wah');

        $validator
            ->decimal('price_amounnt')
            ->requirePresence('price_amounnt', 'create')
            ->notEmpty('price_amounnt');

        $validator
            ->decimal('price_amounnt_lower')
            ->allowEmpty('price_amounnt_lower');

        $validator
            ->allowEmpty('option');

        $validator
            ->allowEmpty('latitude');

        $validator
            ->allowEmpty('longitude');

        $validator
            ->allowEmpty('isspecial_marketprice');

        $validator
            ->allowEmpty('isspecial_appraised');

        $validator
            ->allowEmpty('iscovering');

        $validator
            ->allowEmpty('isdweller');

        $validator
            ->allowEmpty('direction');

        $validator
            ->allowEmpty('issale');

        $validator
            ->allowEmpty('isrent');

        $validator
            ->allowEmpty('issalerent');

        $validator
            ->allowEmpty('issellout');

        $validator
            ->allowEmpty('issaledown');

        $validator
            ->decimal('floor')
            ->allowEmpty('floor');

        $validator
            ->decimal('price_rent')
            ->allowEmpty('price_rent');

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
        $rules->add($rules->existsIn(['asset_type_id'], 'AssetTypes'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['address_id'], 'Addresses'));
        $rules->add($rules->existsIn(['zone_id'], 'Zones'));

        return $rules;
    }
}
