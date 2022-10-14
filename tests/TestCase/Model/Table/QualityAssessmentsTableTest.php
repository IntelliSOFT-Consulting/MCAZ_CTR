<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QualityAssessmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QualityAssessmentsTable Test Case
 */
class QualityAssessmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QualityAssessmentsTable
     */
    public $QualityAssessments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.quality_assessments',
        'app.applications',
        'app.users',
        'app.compliance',
        'app.pdrugs',
        'app.sdrugs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('QualityAssessments') ? [] : ['className' => QualityAssessmentsTable::class];
        $this->QualityAssessments = TableRegistry::get('QualityAssessments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QualityAssessments);

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
