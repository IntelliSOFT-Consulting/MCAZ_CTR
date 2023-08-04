<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuditTrailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuditTrailsTable Test Case
 */
class AuditTrailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AuditTrailsTable
     */
    public $AuditTrails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.audit_trails'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AuditTrails') ? [] : ['className' => AuditTrailsTable::class];
        $this->AuditTrails = TableRegistry::get('AuditTrails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuditTrails);

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
