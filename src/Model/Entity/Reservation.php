<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $id
 * @property int $book_id
 * @property int $fair_id
 * @property \Cake\I18n\Time $timestamp
 *
 * @property \App\Model\Entity\Book $book
 * @property \App\Model\Entity\Fair $fair
 */class Reservation extends Entity
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
