<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableSemester extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'semester' => [
                'type'          => 'VARCHAR',
               
                'constraint' => 10
            ],
            'tahun_pelajaran' => [
                'type'          => 'VARCHAR',
                'constraint' => 50
            ],

            'created_at'           => ['type' => 'datetime', 'null' => true],
            'updated_at'           => ['type' => 'datetime', 'null' => true],
            'deleted_at'           => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('semester');
    }

    public function down()
    {
        $this->forge->dropTable('semester');
    }
}
