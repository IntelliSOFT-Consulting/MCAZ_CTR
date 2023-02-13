<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComplianceTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComplianceTable Test Case
 */
class ComplianceTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ComplianceTable
     */
    public $Compliance;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.compliance',
        'app.applications',
        'app.quality_assessments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Compliance') ? [] : ['className' => ComplianceTable::class];
        $this->Compliance = TableRegistry::get('Compliance', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Compliance);

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
