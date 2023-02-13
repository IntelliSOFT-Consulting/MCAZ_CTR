<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdrugsConditionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdrugsConditionsTable Test Case
 */
class SdrugsConditionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdrugsConditionsTable
     */
    public $SdrugsConditions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sdrugs_conditions',
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
        $config = TableRegistry::exists('SdrugsConditions') ? [] : ['className' => SdrugsConditionsTable::class];
        $this->SdrugsConditions = TableRegistry::get('SdrugsConditions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdrugsConditions);

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
