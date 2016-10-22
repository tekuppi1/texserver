<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Log Model
 */
class UsersTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    public function validationDefault(Validator $validator) {
        $validator->integer('id')->allowEmpty('id', 'create');
        $validator->requirePresence('username', 'create')->notEmpty('username');
        $validator->requirePresence('password', 'create')->notEmpty('password');
        $validator->requirePresence('role', 'create')->notEmpty('role');
        return $validator;
    }

    public function buildRules(RulesChecker $rules) {
        /*$rules->add($rules->isUnique(['username']), [
            'message' => __('既に使われているユーザ名です。')
        ]);*/
        $rules->add($rules->isUnique(['username']), 'username', [
            'errorField' => 'status',
            'message' => __('既に使われているユーザ名です。')
        ]);
        return $rules;
    }
}
