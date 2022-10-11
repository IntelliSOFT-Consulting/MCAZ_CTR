<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClinicalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClinicalsTable Test Case
 */
class ClinicalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClinicalsTable
     */
    public $Clinicals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clinicals',
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
        $config = TableRegistry::exists('Clinicals') ? [] : ['className' => ClinicalsTable::class];
        $this->Clinicals = TableRegistry::get('Clinicals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Clinicals);

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
