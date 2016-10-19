<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property string $title
 * @property string $author
 * @property int $price
 * @property int $cat_id
 * @property string $img
 * @property string $isbn
 */
 class Book extends Entity {
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
