<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fair Model
 */
 class FairTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('fair');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasMany('Reservation', [
            'foreignKey' => 'fair_id'
        ]);
    }

    public function validationDefault(Validator $validator) {
        $validator->integer('id')->allowEmpty('id', 'create');
        $validator->dateTime('start_date')->requirePresence('start_date', 'create')->notEmpty('start_date');
        $validator->dateTime('ending_date')->requirePresence('ending_date', 'create')->notEmpty('ending_date');
        $validator->requirePresence('place', 'create')->notEmpty('place');
        $validator->dateTime('timestamp')->requirePresence('timestamp', 'create')->notEmpty('timestamp');
        return $validator;
    }
}
