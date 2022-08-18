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
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.groups',
        'app.amendments',
        'app.evaluation_comments',
        'app.attachments',
        'app.notification_comments',
        'app.committee_comments',
        'app.application_stages',
        'app.stages',
        'app.investigator_contacts',
        'app.participants',
        'app.medicines',
        'app.placebos',
        'app.evaluation_headers',
        'app.evaluations',
        'app.site_details',
        'app.provinces',
        'app.sites',
        'app.sponsors',
        'app.committees',
        'app.finance_approvals',
        'app.finance_annual_approvals',
        'app.assign_evaluators',
        'app.committee_reviews',
        'app.comments',
        'app.dg_reviews',
        'app.final_stages',
        'app.annual_approvals',
        'app.appeals',
        'app.request_infos',
        'app.seventy_fives',
        'app.gcp_inspections',
        'app.registrations',
        'app.policies',
        'app.details',
        'app.proofs',
        'app.cover_letters',
        'app.protocols',
        'app.fees',
        'app.receipts',
        'app.mc10_forms',
        'app.leaflets',
        'app.brochures',
        'app.investigator_cvs',
        'app.declarations',
        'app.study_monitors',
        'app.monitoring_plans',
        'app.pi_declarations',
        'app.study_sponsorships',
        'app.pharmacy_plans',
        'app.pharmacy_licenses',
        'app.study_medicines',
        'app.insurance_certificates',
        'app.generic_insurances',
        'app.ethics_approvals',
        'app.ethics_letters',
        'app.country_approvals',
        'app.advertisments',
        'app.safety_monitors',
        'app.biological_products',
        'app.dossiers',
        'app.legal_forms',
        'app.clinicals',
        'app.non_clinicals',
        'app.statisticals',
        'app.notifications',
        'app.messages',
        'app.sdrug'
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
