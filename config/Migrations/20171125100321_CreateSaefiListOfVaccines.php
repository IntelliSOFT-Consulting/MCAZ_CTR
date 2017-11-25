<?php
use Migrations\AbstractMigration;

class CreateSaefiListOfVaccines extends AbstractMigration
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
        $table = $this->table('saefi_list_of_vaccines');
        $table->addColumn('saefi_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ]);
        $table->addColumn('vaccine_name', 'string', [
                'default' => null,
                'limit' => 200,
                'null' => true,
            ]);
        $table->addColumn('vaccination_doses', 'integer', [
                'default' => null,
                'limit' => 11,
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
