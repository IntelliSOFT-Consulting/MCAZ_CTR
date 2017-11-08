<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SadrOtherDrugsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SadrOtherDrugsTable Test Case
 */
class SadrOtherDrugsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SadrOtherDrugsTable
     */
    public $SadrOtherDrugs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sadr_other_drugs',
        'app.sadrs',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.designations',
        'app.pqmps',
        'app.counties',
        'app.sadr_followups',
        'app.attachments',
        'app.feedbacks',
        'app.messages',
        'app.sadr_list_of_drugs',
        'app.doses',
        'app.routes',
        'app.frequencies',
        'app.sub_counties',
        'app.countries',
        'app.groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SadrOtherDrugs') ? [] : ['className' => SadrOtherDrugsTable::class];
        $this->SadrOtherDrugs = TableRegistry::get('SadrOtherDrugs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SadrOtherDrugs);

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
