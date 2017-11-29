<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FacilityCodesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FacilityCodesTable Test Case
 */
class FacilityCodesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FacilityCodesTable
     */
    public $FacilityCodes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.facility_codes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FacilityCodes') ? [] : ['className' => FacilityCodesTable::class];
        $this->FacilityCodes = TableRegistry::get('FacilityCodes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FacilityCodes);

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
