<?php
use Migrations\AbstractMigration;

class CreateAdrs extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('adrs');
        $table->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
        ]);
        $table->addColumn('mrcz_protocol_number', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
        ]);
        $table->addColumn('mcaz_protocol_number', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
        ]);
        $table->addColumn('principal_investigator', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
        ]);
        $table->addColumn('reporter_name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
        ]);
        $table->addColumn('reporter_email', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
        ]);
        $table->addColumn('designation_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
        ]);
        $table->addColumn('reporter_phone', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
        ]);
        $table->addColumn('name_of_institution', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
        ]);
        $table->addColumn('institution_code', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
        ]);
        $table->addColumn('study_title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
        ]);
        $table->addColumn('study_sponsor', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
        ]);
        $table->addColumn('date_of_adverse_event', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
        ]);
        $table->addColumn('participant_number', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
        ]);
        $table->addColumn('report_type', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
        ]);
        $table->addColumn('date_of_site_awareness', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
        ]);
        $table->addColumn('date_of_birth', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => true,
            ]);
        $table->addColumn('gender', 'string', [
                'default' => null,
                'limit' => 17,
                'null' => true,
        ]);
        $table->addColumn('study_week', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('visit_number', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('adverse_event_type', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('sae_type', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
        ]);
        $table->addColumn('sae_description', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('toxicity_grade', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('previous_events', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('previous_events_number', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('total_saes', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('location_event', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('location_event_specify', 'text', [
                'default' => null,
                'null' => true,
        ]);
        $table->addColumn('research_involves', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('research_involves_specify', 'text', [
                'default' => null,
                'null' => true,
        ]);
        $table->addColumn('name_of_drug', 'text', [
                'default' => null,
                'null' => true,
        ]);
        //list of drugs
        $table->addColumn('drug_investigational', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('patient_other_drug', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        //list of concommitant
        $table->addColumn('report_to_mcaz', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('report_to_mcaz_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
        ]);
        $table->addColumn('report_to_mrcz', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('report_to_mrcz_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
        ]);
        $table->addColumn('report_to_sponsor', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('report_to_sponsor_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
        ]);
        $table->addColumn('report_to_irb', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('report_to_irb_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
        ]);

        $table->addColumn('medical_history', 'text', [
                'default' => null,
                'null' => true,
        ]);
        $table->addColumn('diagnosis', 'text', [
                'default' => null,
                'null' => true,
        ]);
        $table->addColumn('immediate_cause', 'text', [
                'default' => null,
                'null' => true,
        ]);
        $table->addColumn('symptoms', 'text', [
                'default' => null,
                'null' => true,
        ]);
        $table->addColumn('investigations', 'text', [
                'default' => null,
                'null' => true,
        ]);
        //list of lab tests
        $table->addColumn('results', 'text', [
                'default' => null,
                'null' => true,
        ]);
        $table->addColumn('management', 'text', [
                'default' => null,
                'null' => true,
        ]);
        $table->addColumn('outcome', 'text', [
                'default' => null,
                'null' => true,
        ]);
        //Attachment of death form
        $table->addColumn('d1_consent_form', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('d2_brochure', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('d3_changes_sae', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        $table->addColumn('d4_consent_sae', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);
        //Attach revised protocol
        $table->addColumn('changes_explain', 'text', [
                'default' => null,
                'null' => true,
        ]);
        $table->addColumn('assess_risk', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
        ]);

        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
