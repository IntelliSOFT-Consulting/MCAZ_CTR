<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SadrListOfDrugsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SadrListOfDrugsTable Test Case
 */
class SadrListOfDrugsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SadrListOfDrugsTable
     */
    public $SadrListOfDrugs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sadr_list_of_drugs',
        'app.sadrs',
        'app.users',
        'app.designations',
        'app.pqmps',
        'app.counties',
        'app.sadr_followups',
        'app.attachments',
        'app.feedbacks',
        'app.messages',
        'app.sub_counties',
        'app.countries',
        'app.groups',
        'app.vigiflows',
        'app.doses',
        'app.routes',
        'app.frequencies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SadrListOfDrugs') ? [] : ['className' => SadrListOfDrugsTable::class];
        $this->SadrListOfDrugs = TableRegistry::get('SadrListOfDrugs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SadrListOfDrugs);

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
