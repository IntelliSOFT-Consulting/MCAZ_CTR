<?php
use Migrations\AbstractMigration;

class CreateCompliance extends AbstractMigration
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
        $table = $this->table('compliance');
        $table->addColumn('application_id', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('quality_assessment_id', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('name', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('function', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('valid_license', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('comment', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->create();
    }
}
