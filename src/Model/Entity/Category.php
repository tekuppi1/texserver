<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property string $university
 * @property string $gakubu
 * @property string $gakka
 */
 class Category extends Entity {
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
