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
        $validator->requirePresence('title', 'create')->notEmpty('title', "タイトルが不明です。");
        $validator->requirePresence('author', 'create')->notEmpty('author', "著者名が不明です。");
        $validator->integer('price')->requirePresence('price', 'create')->notEmpty('price', "価格が不明です。");
        $validator->requirePresence('img', 'create')->notEmpty('img', "画像URLが不明です。");
        $validator->requirePresence('isbn', 'create')->notEmpty('isbn', "ISBNが不明です。");
        return $validator;
    }

    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['cat_id'], 'Category'));
        return $rules;
    }
}
