<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableNilaiMapelSiswa extends Migration
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
            'id_siswa' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 50,
                'null' => true
            ],
            'id_nilai' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 50,
                'null' => true
            ],
            'id_semester' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 50,
                'null' => true
            ],
            'nilai' => [
                'type'          => 'VARCHAR',
                'constraint' => 50
            ],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_siswa', 'siswa', 'id');
        $this->forge->addForeignKey('id_nilai', 'nilai_rata_rata_siswa', 'id');
        $this->forge->addForeignKey('id_semester', 'semester', 'id');
        $this->forge->createTable('nilai_mapel_siswa');
    }

    public function down()
    {
        $this->forge->dropTable('nilai_mapel_siswa');
    }
}
