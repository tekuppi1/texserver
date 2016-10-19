<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fair Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $ending_date
 * @property string $place
 * @property \Cake\I18n\Time $timestamp
 *
 * @property \App\Model\Entity\Reservation[] $reservation
 */
 class Fair extends Entity {
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
