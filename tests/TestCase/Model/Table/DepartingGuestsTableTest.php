<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartingGuestsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepartingGuestsTable Test Case
 */
class DepartingGuestsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DepartingGuestsTable
     */
    protected $DepartingGuests;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.DepartingGuests',
        'app.Guests',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DepartingGuests') ? [] : ['className' => DepartingGuestsTable::class];
        $this->DepartingGuests = $this->getTableLocator()->get('DepartingGuests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DepartingGuests);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DepartingGuestsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DepartingGuestsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
