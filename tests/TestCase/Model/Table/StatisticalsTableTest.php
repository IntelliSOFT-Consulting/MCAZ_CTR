<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatisticalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StatisticalsTable Test Case
 */
class StatisticalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StatisticalsTable
     */
    public $Statisticals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.statisticals',
        'app.applications',
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
        $config = TableRegistry::exists('Statisticals') ? [] : ['className' => StatisticalsTable::class];
        $this->Statisticals = TableRegistry::get('Statisticals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Statisticals);

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
