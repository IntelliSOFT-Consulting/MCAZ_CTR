<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdrugsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdrugsTable Test Case
 */
class SdrugsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdrugsTable
     */
    public $Sdrugs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sdrugs',
        'app.applications',
        'app.quality_assessments',
        'app.sdrugs_conditions',
        'app.storage_conditions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sdrugs') ? [] : ['className' => SdrugsTable::class];
        $this->Sdrugs = TableRegistry::get('Sdrugs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sdrugs);

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
