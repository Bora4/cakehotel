<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OldGuestsFixture
 */
class OldGuestsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'guest_id' => 1,
                'guest_name' => 'Lorem ipsum dolor sit amet',
                'guest_age' => 1,
                'guest_room_id' => 1,
                'guest_entry_date' => '2023-03-05',
                'guest_departure_date' => '2023-03-05',
            ],
        ];
        parent::init();
    }
}
