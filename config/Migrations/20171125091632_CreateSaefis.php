<?php
use Migrations\AbstractMigration;

class CreateSaefis extends AbstractMigration
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
        $table = $this->table('saefis');
        $table->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('reference_number', 'string', [
                'default' => null,
                'limit' => 101,
                'null' => true,
            ]);
        $table->addColumn('basic_details', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('place_vaccination', 'string', [
                'default' => null,
                'limit' => 101,
                'null' => true,
            ]);
        $table->addColumn('place_vaccination_other', 'string', [
                'default' => null,
                'limit' => 250,
                'null' => true,
            ]);
        $table->addColumn('site_type', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('site_type_other', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('vaccination_in', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('vaccination_in_other', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('reporter_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('report_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('start_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('complete_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('designation_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('telephone', 'string', [
                'default' => null,
                'limit' => 40,
                'null' => true,
            ]);
        $table->addColumn('mobile', 'string', [
                'default' => null,
                'limit' => 40,
                'null' => true,
            ]);
        $table->addColumn('reporter_email', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('patient_name', 'string', [
                'default' => null,
                'limit' => 200,
                'null' => true,
            ]);
        $table->addColumn('gender', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => true,
            ]);
        $table->addColumn('hospitalization_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('status_on_date', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('died_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('autopsy_done', 'string', [
                'default' => null,
                'limit' => 40,
                'null' => true,
            ]);
        $table->addColumn('autopsy_done_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('autopsy_planned', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('autopsy_planned_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('past_history', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('past_history_remarks', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('adverse_event', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('adverse_event_remarks', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('allergy_history', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('allergy_history_remarks', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('existing_illness', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('existing_illness_remarks', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('hospitalization_history', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('hospitalization_history_remarks', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('medication_vaccination', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('medication_vaccination_remarks', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('faith_healers', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('faith_healers_remarks', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('family_history', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('family_history_remarks', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('pregnant', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('pregnant_weeks', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ]);
        $table->addColumn('breastfeeding', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('infant', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('birth_weight', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ]);
        $table->addColumn('delivery_procedure', 'string', [
                'default' => null,
                'limit' => 205,
                'null' => true,
            ]);
        $table->addColumn('delivery_procedure_specify', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('source_examination', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('source_documents', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('source_verbal', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('verbal_source', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('source_other', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('source_other_specify', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('examiner_name', 'string', [
                'default' => null,
                'limit' => 205,
                'null' => true,
            ]);
        $table->addColumn('other_sources', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('signs_symptoms', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('person_details', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('person_designation', 'string', [
                'default' => null,
                'limit' => 205,
                'null' => true,
            ]);
        $table->addColumn('person_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('medical_care', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('not_medical_care', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('final_diagnosis', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('when_vaccinated', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('when_vaccinated_specify', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('prescribing_error', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('prescribing_error_specify', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('vaccine_unsterile', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('vaccine_unsterile_specify', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('vaccine_condition', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('vaccine_condition_specify', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('vaccine_reconstitution', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('vaccine_reconstitution_specify', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('vaccine_handling', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('vaccine_handling_specify', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('vaccine_administered', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('vaccine_administered_specify', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('vaccinated_vial', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('vaccinated_session', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('vaccinated_locations', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('vaccinated_locations_specify', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);        
        $table->addColumn('vaccinated_cluster', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('vaccinated_cluster_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('vaccinated_cluster_vial', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('vaccinated_cluster_vial_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('syringes_used', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('syringes_used_specify', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('syringes_used_other', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('syringes_used_findings', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('reconstitution_multiple', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('reconstitution_different', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('reconstitution_vial', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('reconstitution_syringe', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('reconstitution_vaccines', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('reconstitution_observations', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('cold_temperature', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('cold_temperature_deviation', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('cold_temperature_specify', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('procedure_followed', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('other_items', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('partial_vaccines', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('unusable_vaccines', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('unusable_diluents', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('additional_observations', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('cold_transportation', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('vaccine_carrier', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('coolant_packs', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('transport_findings', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('similar_events', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => true,
            ]);
        $table->addColumn('similar_events_describe', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('similar_events_episodes', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('affected_vaccinated', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('affected_not_vaccinated', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('affected_unknown', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);

        $table->addColumn('community_comments', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);        
        $table->addColumn('relevant_findings', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->create();
    }
}
