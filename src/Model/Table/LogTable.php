<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Log Model
 */
class LogTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('log');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    public function validationDefault(Validator $validator) {
        $validator->integer('id')->allowEmpty('id', 'create');
        $validator->requirePresence('code', 'create')->notEmpty('code');
        $validator->requirePresence('path', 'create')->notEmpty('path');
        $validator->requirePresence('agent', 'create')->notEmpty('agent');
        $validator->requirePresence('option', 'create')->notEmpty('option');
        $validator->requirePresence('agent', 'create')->notEmpty('agent');
        $validator->dateTime('timestamp')->requirePresence('timestamp', 'create')->notEmpty('timestamp');
        return $validator;
    }

    public function buildRules(RulesChecker $rules) {
        return $rules;
    }
}
