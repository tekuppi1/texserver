<?php

use Phinx\Migration\AbstractMigration;

class TexdataMigration extends AbstractMigration {
    public function change() {
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
        $table->addColumn('name', 'text', ['default' => null,'null' => false]);
        $table->addColumn('parent_id', 'integer', ['default' => null,'null' => true]);
        $table->create();

        $table = $this->table('users');
        $table->addColumn('username', 'text', ['default' => null,'null' => false]);
        $table->addColumn('password', 'text', ['default' => null,'null' => false]);
        $table->addColumn('role', 'text', ['default' => null,'null' => false]);
        $table->addColumn('created', 'datetime', ['default' => null,'null' => false]);
        $table->addColumn('modified', 'datetime', ['default' => null,'null' => false]);
        $table->create();

        $table = $this->table('log');
        $table->addColumn('code', 'text', ['default' => null,'null' => false]);
        $table->addColumn('path', 'text', ['default' => null,'null' => false]);
        $table->addColumn('agent', 'text', ['default' => null,'null' => false]);
        $table->addColumn('option', 'text', ['default' => null,'null' => false]);
        $table->addColumn('timestamp', 'datetime', ['default' => null,'null' => false]);
        $table->create();
    }
}
