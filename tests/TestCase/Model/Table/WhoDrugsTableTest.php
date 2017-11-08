<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WhoDrugsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WhoDrugsTable Test Case
 */
class WhoDrugsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WhoDrugsTable
     */
    public $WhoDrugs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.who_drugs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('WhoDrugs') ? [] : ['className' => WhoDrugsTable::class];
        $this->WhoDrugs = TableRegistry::get('WhoDrugs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WhoDrugs);

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
