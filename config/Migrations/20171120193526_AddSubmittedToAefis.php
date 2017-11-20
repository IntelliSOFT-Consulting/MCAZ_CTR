<?php
use Migrations\AbstractMigration;

class AddSubmittedToAefis extends AbstractMigration
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
        $table->addColumn('submitted', 'integer', [
                'default' => '0',
                'limit' => 2,
                'null' => true,
            ]);
        $table->update();
    }
}
