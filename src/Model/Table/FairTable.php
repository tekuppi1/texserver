<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fair Model
 *
 * @property \Cake\ORM\Association\HasMany $Reservation
 *
 * @method \App\Model\Entity\Fair get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fair newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fair[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fair|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fair patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fair[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fair findOrCreate($search, callable $callback = null)
 */class FairTable extends Table
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

        $this->table('fair');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Reservation', [
            'foreignKey' => 'fair_id'
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
            ->integer('id')            ->allowEmpty('id', 'create');
        $validator
            ->dateTime('start_date')            ->requirePresence('start_date', 'create')            ->notEmpty('start_date');
        $validator
            ->dateTime('ending_date')            ->requirePresence('ending_date', 'create')            ->notEmpty('ending_date');
        $validator
            ->requirePresence('place', 'create')            ->notEmpty('place');
        $validator
            ->dateTime('timestamp')            ->requirePresence('timestamp', 'create')            ->notEmpty('timestamp');
        return $validator;
    }
}
