<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdrsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdrsTable Test Case
 */
class AdrsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdrsTable
     */
    public $Adrs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.adrs',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.designations',
        'app.pqmps',
        'app.counties',
        'app.sadr_followups',
        'app.sadrs',
        'app.attachments',
        'app.sadr_list_of_drugs',
        'app.doses',
        'app.routes',
        'app.frequencies',
        'app.sadr_other_drugs',
        'app.feedbacks',
        'app.messages',
        'app.sub_counties',
        'app.countries',
        'app.groups',
        'app.adr_lab_tests',
        'app.adr_list_of_drugs',
        'app.adr_other_drugs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Adrs') ? [] : ['className' => AdrsTable::class];
        $this->Adrs = TableRegistry::get('Adrs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Adrs);

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
