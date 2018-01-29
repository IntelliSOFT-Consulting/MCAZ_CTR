<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SitesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SitesTable Test Case
 */
class SitesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SitesTable
     */
    public $Sites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sites'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sites') ? [] : ['className' => SitesTable::class];
        $this->Sites = TableRegistry::get('Sites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sites);

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
