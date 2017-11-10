<?php
use Migrations\AbstractMigration;

class RemoveDoseFromAefiListOfVaccines extends AbstractMigration
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
        $table->removeColumn('dose');
        $table->update();
    }
}
