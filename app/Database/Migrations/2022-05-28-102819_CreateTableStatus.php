<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableStatus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => '5',
                'unsigned'       => true,
                'auto_increment' => true,

            ],
            'status' => [
                'type' => 'Varchar',
                'constraint' => '50'
            ],
            'created_at'           => ['type' => 'datetime', 'null' => true],
            'updated_at'           => ['type' => 'datetime', 'null' => true],
            'deleted_at'           => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('status');
    }

    public function down()
    {
        $this->forge->dropTable('status');
    }
}
