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
 */
 class Reservation extends Entity {
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
