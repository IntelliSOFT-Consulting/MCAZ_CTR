<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvestigatorContactsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvestigatorContactsTable Test Case
 */
class InvestigatorContactsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InvestigatorContactsTable
     */
    public $InvestigatorContacts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.investigator_contacts',
        'app.applications',
        'app.users',
        'app.trial_statuses',
        'app.organizations',
        'app.placebos',
        'app.previous_dates',
        'app.reviewers',
        'app.reviews',
        'app.site_details',
        'app.sponsors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InvestigatorContacts') ? [] : ['className' => InvestigatorContactsTable::class];
        $this->InvestigatorContacts = TableRegistry::get('InvestigatorContacts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InvestigatorContacts);

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
