<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrialStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrialStatusesTable Test Case
 */
class TrialStatusesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TrialStatusesTable
     */
    public $TrialStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trial_statuses',
        'app.applications',
        'app.users',
        'app.investigator_contacts',
        'app.organizations',
        'app.placebos',
        'app.previous_dates',
        'app.reviewers',
        'app.reviews',
        'app.site_details',
        'app.counties',
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
        $config = TableRegistry::exists('TrialStatuses') ? [] : ['className' => TrialStatusesTable::class];
        $this->TrialStatuses = TableRegistry::get('TrialStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TrialStatuses);

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
}
