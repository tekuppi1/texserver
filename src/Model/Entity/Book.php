<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 */
 class Book extends Entity {
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
