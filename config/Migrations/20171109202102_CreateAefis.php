<?php
use Migrations\AbstractMigration;

class CreateAefis extends AbstractMigration
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
        $table = $this->table('aefis');
        $table->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('patient_name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('patient_surname', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('patient_next_of_kin', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('patient_address', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('patient_telephone', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        
        $table->addColumn('report_type', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => true,
            ]);
        $table->addColumn('gender', 'string', [
                'default' => null,
                'limit' => 7,
                'null' => true,
            ]);
        $table->addColumn('date_of_birth', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => true,
            ]);
        $table->addColumn('age_at_onset', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => true,
            ]);
        $table->addColumn('age_at_onset_specify', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('reporter_name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('designation_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('reporter_department', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('reporter_address', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('reporter_district', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('reporter_province', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('reporter_phone', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('reporter_email', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('name_of_vaccination_center', 'string', [
                'default' => null,
                'limit' => 200,
                'null' => true,
            ]);

        $table->addColumn('adverse_events', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('adverse_events_specify', 'text', [
                'default' => null,
                'null' => true,
            ]);
        $table->addColumn('aefi_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('notification_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('description_of_reaction', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('treatment_provided', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('serious', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ]);
        $table->addColumn('serious_yes', 'string', [
                'default' => null,
                'limit' => 200,
                'null' => true,
            ]);
        $table->addColumn('outcome', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('died_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('autopsy', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('past_medical_history', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('district_receive_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('investigation_needed', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ]);
        $table->addColumn('investigation_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('national_receive_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('comments', 'text', [
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
