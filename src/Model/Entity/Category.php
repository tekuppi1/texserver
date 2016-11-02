<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 */
 class Category extends Entity {
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
