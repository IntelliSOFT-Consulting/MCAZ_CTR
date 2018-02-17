<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlacebosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlacebosTable Test Case
 */
class PlacebosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PlacebosTable
     */
    public $Placebos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.placebos',
        'app.applications',
        'app.users',
        'app.trial_statuses',
        'app.investigator_contacts',
        'app.organizations',
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
        $config = TableRegistry::exists('Placebos') ? [] : ['className' => PlacebosTable::class];
        $this->Placebos = TableRegistry::get('Placebos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Placebos);

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
