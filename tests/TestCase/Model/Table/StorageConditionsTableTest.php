<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StorageConditionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StorageConditionsTable Test Case
 */
class StorageConditionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StorageConditionsTable
     */
    public $StorageConditions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.storage_conditions',
        'app.applications',
        'app.sdrugs',
        'app.pdrugs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StorageConditions') ? [] : ['className' => StorageConditionsTable::class];
        $this->StorageConditions = TableRegistry::get('StorageConditions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StorageConditions);

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
