<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 */
 class Reservation extends Entity {
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
