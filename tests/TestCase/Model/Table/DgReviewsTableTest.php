<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DgReviewsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DgReviewsTable Test Case
 */
class DgReviewsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DgReviewsTable
     */
    public $DgReviews;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dg_reviews',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.groups',
        'app.applications',
        'app.investigator_contacts',
        'app.participants',
        'app.medicines',
        'app.placebos',
        'app.previous_dates',
        'app.reviewers',
        'app.evaluations',
        'app.site_details',
        'app.provinces',
        'app.sites',
        'app.sponsors',
        'app.committees',
        'app.finance_approvals',
        'app.assign_evaluators',
        'app.committee_reviews',
        'app.request_infos',
        'app.seventy_fives',
        'app.gcp_inspections',
        'app.attachments',
        'app.registrations',
        'app.policies',
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
        'app.electronic_versions',
        'app.safety_monitors',
        'app.biological_products',
        'app.dossiers',
        'app.legal_forms',
        'app.amendments',
        'app.notifications',
        'app.messages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DgReviews') ? [] : ['className' => DgReviewsTable::class];
        $this->DgReviews = TableRegistry::get('DgReviews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DgReviews);

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
