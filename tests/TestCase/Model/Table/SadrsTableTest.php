<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SadrsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SadrsTable Test Case
 */
class SadrsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SadrsTable
     */
    public $Sadrs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sadrs',
        'app.users',
        'app.designations',
        'app.pqmps',
        'app.sadr_followups',
        'app.counties',
        'app.sub_counties',
        'app.groups',
        'app.feedbacks',
        'app.vigiflows',
        'app.attachments',
        'app.messages',
        'app.sadr_list_of_drugs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sadrs') ? [] : ['className' => SadrsTable::class];
        $this->Sadrs = TableRegistry::get('Sadrs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sadrs);

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
