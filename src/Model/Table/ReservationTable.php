<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reservation Model
 */
 class ReservationTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('reservation');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Fairs', [
            'foreignKey' => 'fair_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator) {
        $validator->integer('id')->allowEmpty('id', 'create');
        $validator->dateTime('timestamp')->requirePresence('timestamp', 'create')->notEmpty('timestamp');
        return $validator;
    }

    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['book_id'], 'Books'));
        $rules->add($rules->existsIn(['fair_id'], 'Fairs'));
        return $rules;
    }
}
