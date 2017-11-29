<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubCountiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubCountiesTable Test Case
 */
class SubCountiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubCountiesTable
     */
    public $SubCounties;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sub_counties',
        'app.counties',
        'app.pqmps',
        'app.users',
        'app.designations',
        'app.sadr_followups',
        'app.sadrs',
        'app.vigiflows',
        'app.attachments',
        'app.feedbacks',
        'app.messages',
        'app.sadr_list_of_drugs',
        'app.doses',
        'app.routes',
        'app.frequencies',
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
        $config = TableRegistry::exists('SubCounties') ? [] : ['className' => SubCountiesTable::class];
        $this->SubCounties = TableRegistry::get('SubCounties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SubCounties);

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
