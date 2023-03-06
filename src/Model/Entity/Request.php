<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Request Entity
 *
 * @property int $id
 * @property int $guest_id
 * @property string $request_type
 * @property int|null $food_id
 * @property int|null $employee_id
 *
 * @property \App\Model\Entity\Guest $guest
 * @property \App\Model\Entity\Food $food
 * @property \App\Model\Entity\Employee $employee
 */
class Request extends Entity
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
        'request_type' => true,
        'food_id' => true,
        'employee_id' => true,
        'guest' => true,
        'food' => true,
        'employee' => true,
    ];
}
