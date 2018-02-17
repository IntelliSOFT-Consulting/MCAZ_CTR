<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DosesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DosesTable Test Case
 */
class DosesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DosesTable
     */
    public $Doses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.doses',
        'app.sadr_list_of_drugs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Doses') ? [] : ['className' => DosesTable::class];
        $this->Doses = TableRegistry::get('Doses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Doses);

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
