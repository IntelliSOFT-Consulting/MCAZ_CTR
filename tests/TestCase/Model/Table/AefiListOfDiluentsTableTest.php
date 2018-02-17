<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AefiListOfDiluentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AefiListOfDiluentsTable Test Case
 */
class AefiListOfDiluentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AefiListOfDiluentsTable
     */
    public $AefiListOfDiluents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.aefi_list_of_diluents',
        'app.aefis',
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
        'app.aefi_list_of_vaccines'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AefiListOfDiluents') ? [] : ['className' => AefiListOfDiluentsTable::class];
        $this->AefiListOfDiluents = TableRegistry::get('AefiListOfDiluents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AefiListOfDiluents);

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
