<?php
use Migrations\AbstractMigration;

class CreateAdrListOfDrugs extends AbstractMigration
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
        $table = $this->table('adr_list_of_drugs');

        $table->addColumn('adr_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('drug_name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('dosage', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('dose_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('route_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('frequency_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('start_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('stop_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('taking_drug', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('relationship_to_sae', 'string', [
                'default' => null,
                'limit' => 100,
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
