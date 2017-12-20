<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SiteDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SiteDetailsTable Test Case
 */
class SiteDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SiteDetailsTable
     */
    public $SiteDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.site_details',
        'app.applications',
        'app.users',
        'app.trial_statuses',
        'app.investigator_contacts',
        'app.organizations',
        'app.placebos',
        'app.previous_dates',
        'app.reviewers',
        'app.reviews',
        'app.sponsors',
        'app.counties'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SiteDetails') ? [] : ['className' => SiteDetailsTable::class];
        $this->SiteDetails = TableRegistry::get('SiteDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SiteDetails);

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
