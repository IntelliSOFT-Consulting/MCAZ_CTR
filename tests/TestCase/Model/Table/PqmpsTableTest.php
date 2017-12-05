<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PqmpsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PqmpsTable Test Case
 */
class PqmpsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PqmpsTable
     */
    public $Pqmps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pqmps',
        'app.users',
        'app.designations',
        'app.sadr_followups',
        'app.sadrs',
        'app.counties',
        'app.sub_counties',
        'app.vigiflows',
        'app.attachments',
        'app.feedbacks',
        'app.messages',
        'app.sadr_list_of_drugs',
        'app.groups',
        'app.countries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Pqmps') ? [] : ['className' => PqmpsTable::class];
        $this->Pqmps = TableRegistry::get('Pqmps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pqmps);

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
