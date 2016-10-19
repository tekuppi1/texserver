<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Category Model
 */class CategoryTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('category');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    public function validationDefault(Validator $validator) {
        $validator->integer('id')->allowEmpty('id', 'create');
        $validator->requirePresence('university', 'create')->notEmpty('university');
        $validator->requirePresence('gakubu', 'create')->notEmpty('gakubu');
        $validator->requirePresence('gakka', 'create')->notEmpty('gakka');
        return $validator;
    }
}
