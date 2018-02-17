<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdrListOfDrugsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdrListOfDrugsTable Test Case
 */
class AdrListOfDrugsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdrListOfDrugsTable
     */
    public $AdrListOfDrugs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.adr_list_of_drugs',
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
        $config = TableRegistry::exists('AdrListOfDrugs') ? [] : ['className' => AdrListOfDrugsTable::class];
        $this->AdrListOfDrugs = TableRegistry::get('AdrListOfDrugs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdrListOfDrugs);

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
