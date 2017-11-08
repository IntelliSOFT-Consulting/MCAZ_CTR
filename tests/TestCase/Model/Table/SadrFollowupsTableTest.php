<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SadrFollowupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SadrFollowupsTable Test Case
 */
class SadrFollowupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SadrFollowupsTable
     */
    public $SadrFollowups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sadr_followups',
        'app.users',
        'app.designations',
        'app.pqmps',
        'app.counties',
        'app.sadrs',
        'app.sub_counties',
        'app.vigiflows',
        'app.attachments',
        'app.feedbacks',
        'app.messages',
        'app.sadr_list_of_drugs',
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
        $config = TableRegistry::exists('SadrFollowups') ? [] : ['className' => SadrFollowupsTable::class];
        $this->SadrFollowups = TableRegistry::get('SadrFollowups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SadrFollowups);

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
