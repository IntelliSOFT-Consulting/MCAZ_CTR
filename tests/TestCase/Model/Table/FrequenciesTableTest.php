<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FrequenciesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FrequenciesTable Test Case
 */
class FrequenciesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FrequenciesTable
     */
    public $Frequencies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.frequencies',
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
        $config = TableRegistry::exists('Frequencies') ? [] : ['className' => FrequenciesTable::class];
        $this->Frequencies = TableRegistry::get('Frequencies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Frequencies);

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
