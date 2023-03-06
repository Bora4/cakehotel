<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OldGuestsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OldGuestsTable Test Case
 */
class OldGuestsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OldGuestsTable
     */
    protected $OldGuests;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.OldGuests',
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
        $config = $this->getTableLocator()->exists('OldGuests') ? [] : ['className' => OldGuestsTable::class];
        $this->OldGuests = $this->getTableLocator()->get('OldGuests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->OldGuests);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OldGuestsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\OldGuestsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
