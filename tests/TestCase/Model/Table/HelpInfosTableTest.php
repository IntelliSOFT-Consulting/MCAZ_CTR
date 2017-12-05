<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HelpInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HelpInfosTable Test Case
 */
class HelpInfosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HelpInfosTable
     */
    public $HelpInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.help_infos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('HelpInfos') ? [] : ['className' => HelpInfosTable::class];
        $this->HelpInfos = TableRegistry::get('HelpInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HelpInfos);

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
}
