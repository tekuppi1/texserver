<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 */
 class Log extends Entity {
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
