<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DrugDictionariesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DrugDictionariesTable Test Case
 */
class DrugDictionariesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DrugDictionariesTable
     */
    public $DrugDictionaries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.drug_dictionaries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DrugDictionaries') ? [] : ['className' => DrugDictionariesTable::class];
        $this->DrugDictionaries = TableRegistry::get('DrugDictionaries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DrugDictionaries);

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
