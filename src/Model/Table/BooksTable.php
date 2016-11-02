<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Books Model
 */
class BooksTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('books');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->belongsTo('Category', [
            'foreignKey' => 'cat_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Reservation', [
            'foreignKey' => 'book_id'
        ]);
    }

    public function validationDefault(Validator $validator) {
        $validator->integer('id')->allowEmpty('id', 'create');
        $validator->requirePresence('title', 'create')->notEmpty('title');
        $validator->requirePresence('author', 'create')->notEmpty('author');
        $validator->integer('price')->requirePresence('price', 'create')->notEmpty('price');
        $validator->requirePresence('img', 'create')->notEmpty('img');
        $validator->requirePresence('isbn', 'create')->notEmpty('isbn');
        return $validator;
    }

    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['cat_id'], 'Category'));
        return $rules;
    }
}
