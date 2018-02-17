<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SaefisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SaefisTable Test Case
 */
class SaefisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SaefisTable
     */
    public $Saefis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.saefis',
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
        'app.adrs',
        'app.adr_lab_tests',
        'app.adr_list_of_drugs',
        'app.adr_other_drugs',
        'app.aefis',
        'app.provinces',
        'app.aefi_list_of_vaccines',
        'app.aefi_list_of_diluents',
        'app.saefi_list_of_vaccines'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Saefis') ? [] : ['className' => SaefisTable::class];
        $this->Saefis = TableRegistry::get('Saefis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Saefis);

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
