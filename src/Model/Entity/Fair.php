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
 */class Fair extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
