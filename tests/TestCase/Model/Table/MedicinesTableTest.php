<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedicinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedicinesTable Test Case
 */
class MedicinesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MedicinesTable
     */
    public $Medicines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.medicines',
        'app.applications',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.groups',
        'app.notifications',
        'app.trial_statuses',
        'app.investigator_contacts',
        'app.participants',
        'app.organizations',
        'app.placebos',
        'app.previous_dates',
        'app.reviewers',
        'app.reviews',
        'app.site_details',
        'app.provinces',
        'app.sites',
        'app.sponsors',
        'app.committees',
        'app.attachments',
        'app.registrations',
        'app.policies',
        'app.cover_letters',
        'app.protocols',
        'app.fees',
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
        'app.legal_forms'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Medicines') ? [] : ['className' => MedicinesTable::class];
        $this->Medicines = TableRegistry::get('Medicines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Medicines);

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
