<?php
use Migrations\AbstractMigration;

class CreateAttachments extends AbstractMigration
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
        $table = $this->table('attachments');        
         
        $table->addColumn('foreign_key', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ]);
        $table->addColumn('file', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('dir', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('size', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('type', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('model', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);     
        $table->addColumn('category', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('description', 'text', [
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
