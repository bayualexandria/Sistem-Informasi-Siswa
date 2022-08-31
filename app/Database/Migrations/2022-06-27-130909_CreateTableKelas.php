<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableKelas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kelas' => [
                'type' => 'Varchar',
                'constraint' => 100,
            ],
            'id_jurusan' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'constraint' => 5
            ],
            'id_guru' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'constraint' => 5
            ],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_jurusan', 'jurusan', 'id');
        $this->forge->addForeignKey('id_guru', 'guru', 'id');
        $this->forge->createTable('kelas');
    }

    public function down()
    {
        $this->forge->dropTable('kelas');
    }
}
