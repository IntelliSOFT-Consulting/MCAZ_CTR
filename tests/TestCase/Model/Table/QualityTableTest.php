<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QualityTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QualityTable Test Case
 */
class QualityTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QualityTable
     */
    public $Quality;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.quality',
        'app.applications',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Quality') ? [] : ['className' => QualityTable::class];
        $this->Quality = TableRegistry::get('Quality', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Quality);

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
