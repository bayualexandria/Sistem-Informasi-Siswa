<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUsers extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'username' => [
                    'type' => 'varchar',
                    'constraint' => '100'
                ],
                'password' => [
                    'type' => 'varchar',
                    'constraint' => '255',
                    'null' => true
                ],
                'status_id' => [
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'constraint' => 5
                ],
                'is_active' => [
                    'type' => 'INT',
                    'constraint'=>1,
                    'default' => "0",
                    'null' => FALSE,
                ],
                'created_at'           => ['type' => 'datetime', 'null' => true],
                'updated_at'           => ['type' => 'datetime', 'null' => true],
                'deleted_at'           => ['type' => 'datetime', 'null' => true],
            ]
        );
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('status_id', 'status', 'id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
