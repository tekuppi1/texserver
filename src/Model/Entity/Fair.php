<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fair Entity
 */
 class Fair extends Entity {
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
