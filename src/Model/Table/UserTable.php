<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Log Model
 */
class UserTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('user');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    public function validationDefault(Validator $validator) {
        $validator->integer('id')->allowEmpty('id', 'create');
        $validator->requirePresence('username', 'create')->notEmpty('username');
        $validator->requirePresence('password', 'create')->notEmpty('password');
        $validator->requirePresence('role', 'create')->notEmpty('role');
        $validator->dateTime('created')->requirePresence('timestamp', 'create')->notEmpty('created');
        $validator->dateTime('modified')->requirePresence('timestamp', 'create')->notEmpty('modified');
        return $validator;
    }

    public function buildRules(RulesChecker $rules) {
        return $rules;
    }
}
