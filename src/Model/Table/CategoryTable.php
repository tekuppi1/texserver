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
        $this->hasMany('Category', [
            'foreignKey' => 'parent_id'
        ]);
    }

    public function validationDefault(Validator $validator) {
        $validator->integer('id')->allowEmpty('id', 'create');
        $validator->requirePresence('name', 'create')->notEmpty('name');
        return $validator;
    }

    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['parent_id'], 'Category'));
        return $rules;
    }
}
