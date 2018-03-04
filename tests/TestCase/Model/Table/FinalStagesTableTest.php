<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FinalStagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FinalStagesTable Test Case
 */
class FinalStagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FinalStagesTable
     */
    public $FinalStages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.final_stages',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.groups',
        'app.applications',
        'app.application_stages',
        'app.investigator_contacts',
        'app.participants',
        'app.medicines',
        'app.placebos',
        'app.previous_dates',
        'app.evaluation_headers',
        'app.evaluations',
        'app.site_details',
        'app.provinces',
        'app.sites',
        'app.sponsors',
        'app.committees',
        'app.finance_approvals',
        'app.assign_evaluators',
        'app.committee_reviews',
        'app.comments',
        'app.attachments',
        'app.dg_reviews',
        'app.request_infos',
        'app.seventy_fives',
        'app.gcp_inspections',
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
        $config = TableRegistry::exists('FinalStages') ? [] : ['className' => FinalStagesTable::class];
        $this->FinalStages = TableRegistry::get('FinalStages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FinalStages);

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
