<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RefidsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RefidsTable Test Case
 */
class RefidsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RefidsTable
     */
    public $Refids;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.refids'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Refids') ? [] : ['className' => RefidsTable::class];
        $this->Refids = TableRegistry::get('Refids', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Refids);

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
