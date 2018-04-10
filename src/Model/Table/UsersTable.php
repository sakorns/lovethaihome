<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Assets
 * @property \Cake\ORM\Association\HasMany $Useimages
 * @property \Cake\ORM\Association\HasMany $UserAddresses
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Assets', [
            'foreignKey' => 'user_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Useimages', [
            'foreignKey' => 'user_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('UserAddresses', [
            'foreignKey' => 'user_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->uuid('id')
                ->allowEmpty('id', 'create');

        $validator
                ->allowEmpty('usercode');

        $validator
                ->allowEmpty('title');

        $validator
                ->requirePresence('firstname', 'create')
                ->notEmpty('firstname');

        $validator
                ->requirePresence('lastname', 'create')
                ->notEmpty('lastname');

        $validator
                ->allowEmpty('username');

        $validator
                ->allowEmpty('password');

        $validator
                ->email('email')
                ->requirePresence('email', 'create')
                ->notEmpty('email');

        $validator
                ->allowEmpty('phone');

        $validator
                ->allowEmpty('lineid');

        $validator
                ->allowEmpty('fax');

        $validator
                ->allowEmpty('isactive');

        $validator
                ->allowEmpty('isverify');

        $validator
                ->allowEmpty('islocked');

        $validator
                ->allowEmpty('iscustomer');

        $validator
                ->allowEmpty('isseller');

        $validator
                ->allowEmpty('gender');

        $validator
                ->allowEmpty('verifycode');

        $validator
                ->allowEmpty('position');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['username']));
        //$rules->add($rules->isUnique(['email']));

        return $rules;
    }

}
