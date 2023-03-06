<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Guest Entity
 *
 * @property int $id
 * @property string $name
 * @property int $room_id
 * @property \Cake\I18n\FrozenDate $entry_date
 * @property \Cake\I18n\FrozenDate $departure_date
 *
 * @property \App\Model\Entity\Room $room
 * @property \App\Model\Entity\DepartingGuest[] $departing_guests
 * @property \App\Model\Entity\OldGuest[] $old_guests
 * @property \App\Model\Entity\Request[] $requests
 */
class Guest extends Entity
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
        'name' => true,
        'room_id' => true,
        'entry_date' => true,
        'departure_date' => true,
        'room' => true,
        'departing_guests' => true,
        'old_guests' => true,
        'requests' => true,
    ];
}
