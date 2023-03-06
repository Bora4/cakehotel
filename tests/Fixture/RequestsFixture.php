<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RequestsFixture
 */
class RequestsFixture extends TestFixture
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
                'request_type' => 'Lorem ipsum dolor sit amet',
                'food_id' => 1,
            ],
        ];
        parent::init();
    }
}
