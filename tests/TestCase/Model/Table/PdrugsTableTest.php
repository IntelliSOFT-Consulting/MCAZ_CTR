<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PdrugsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PdrugsTable Test Case
 */
class PdrugsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PdrugsTable
     */
    public $Pdrugs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pdrugs',
        'app.applications',
        'app.quality_assessments',
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
        $config = TableRegistry::exists('Pdrugs') ? [] : ['className' => PdrugsTable::class];
        $this->Pdrugs = TableRegistry::get('Pdrugs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pdrugs);

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
