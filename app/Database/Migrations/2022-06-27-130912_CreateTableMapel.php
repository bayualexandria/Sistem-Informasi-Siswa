<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableMapel extends Migration
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
            'nama_mapel' => [
                'type' => 'Varchar',
                'constraint' => 100,
            ],
            'kelas_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
                'null' => true
            ],
            'guru_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
                'null' => true
            ],
            'hari' => [
                'type' => 'ENUM("Senin","Selasa","Rabu","Kamis","Jum`at","Sabtu")',
                'null' => FALSE,
            ],
            'waktu' => [
                'type' => 'Varchar',
                'constraint' => 100,
            ],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('kelas_id', 'kelas', 'id');
        $this->forge->addForeignKey('guru_id', 'guru', 'id');
        $this->forge->createTable('mapel');
    }

    public function down()
    {
        $this->forge->dropTable('mapel');
    }
}
