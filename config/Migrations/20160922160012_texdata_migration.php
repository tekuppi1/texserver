<?php

use Phinx\Migration\AbstractMigration;

class TexdataMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('books');
        $table->addColumn('title', 'text', ['default' => null,'null' => false]);
        $table->addColumn('author', 'text', ['default' => null,'null' => false]);
        $table->addColumn('price', 'integer', ['default' => null,'null' => false]);
        $table->addColumn('cat_id', 'integer', ['default' => null,'null' => false]);
        $table->addColumn('img', 'text', ['default' => null,'null' => false]);
        $table->addColumn('isbn', 'text', ['default' => null,'null' => false]);
        $table->create();

        $table = $this->table('reservation');
        $table->addColumn('book_id', 'integer', ['default' => null,'null' => false]);
        $table->addColumn('fair_id', 'integer', ['default' => null,'null' => false]);
        $table->addColumn('timestamp', 'datetime', ['default' => null,'null' => false]);
        $table->create();

        $table = $this->table('fair');
        $table->addColumn('start_date', 'datetime', ['default' => null,'null' => false]);
        $table->addColumn('ending_date', 'datetime', ['default' => null,'null' => false]);
        $table->addColumn('place', 'text', ['default' => null,'null' => false]);
        $table->addColumn('timestamp', 'datetime', ['default' => null,'null' => false]);
        $table->create();

        $table = $this->table('category');
        $table->addColumn('university', 'text', ['default' => null,'null' => false]);
        $table->addColumn('gakubu', 'text', ['default' => null,'null' => false]);
        $table->addColumn('gakka', 'text', ['default' => null,'null' => false]);
        $table->create();
    }
}
