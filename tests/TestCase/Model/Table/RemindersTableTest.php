<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RemindersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RemindersTable Test Case
 */
class RemindersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RemindersTable
     */
    public $Reminders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reminders',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Reminders') ? [] : ['className' => RemindersTable::class];
        $this->Reminders = TableRegistry::get('Reminders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reminders);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
