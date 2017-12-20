<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SaefiListOfVaccinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SaefiListOfVaccinesTable Test Case
 */
class SaefiListOfVaccinesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SaefiListOfVaccinesTable
     */
    public $SaefiListOfVaccines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.saefi_list_of_vaccines',
        'app.saefis'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SaefiListOfVaccines') ? [] : ['className' => SaefiListOfVaccinesTable::class];
        $this->SaefiListOfVaccines = TableRegistry::get('SaefiListOfVaccines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SaefiListOfVaccines);

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
