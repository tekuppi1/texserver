<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 */
 class User extends Entity {
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
