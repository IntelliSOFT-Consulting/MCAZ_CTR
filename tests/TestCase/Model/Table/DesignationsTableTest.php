<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DesignationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DesignationsTable Test Case
 */
class DesignationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DesignationsTable
     */
    public $Designations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.designations',
        'app.pqmps',
        'app.sadr_followups',
        'app.sadrs',
        'app.users',
        'app.counties',
        'app.sub_counties',
        'app.groups',
        'app.feedbacks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Designations') ? [] : ['className' => DesignationsTable::class];
        $this->Designations = TableRegistry::get('Designations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Designations);

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
