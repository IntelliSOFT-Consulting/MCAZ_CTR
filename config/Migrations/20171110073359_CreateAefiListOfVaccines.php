<?php
use Migrations\AbstractMigration;

class CreateAefiListOfVaccines extends AbstractMigration
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
        $table = $this->table('aefi_list_of_vaccines');

        $table->addColumn('aefi_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('vaccine_name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ]);
        $table->addColumn('vaccination_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('dosage', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('batch_number', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('expiry_date', 'date', [
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
