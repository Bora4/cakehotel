<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DepartingGuestsFixture
 */
class DepartingGuestsFixture extends TestFixture
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
                'guest_departure_date' => '2023-03-05',
            ],
        ];
        parent::init();
    }
}
