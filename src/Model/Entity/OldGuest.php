<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OldGuest Entity
 *
 * @property int $id
 * @property int $guest_id
 * @property string $guest_name
 * @property int $guest_age
 * @property int $guest_room_id
 * @property \Cake\I18n\FrozenDate $guest_entry_date
 * @property \Cake\I18n\FrozenDate $guest_departure_date
 *
 * @property \App\Model\Entity\Guest $guest
 */
class OldGuest extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'guest_id' => true,
        'guest_name' => true,
        'guest_age' => true,
        'guest_room_id' => true,
        'guest_entry_date' => true,
        'guest_departure_date' => true,
        'guest' => true,
    ];
}
