<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableNilaiSiswa extends Migration
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
           
            'nilai_rata_rata' => [
                'type'          => 'VARCHAR',
                'constraint' => 10
            ],
            'id_mapel' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 50,
                'null' => true
            ],
            'created_at'           => ['type' => 'datetime', 'null' => true],
            'updated_at'           => ['type' => 'datetime', 'null' => true],
            'deleted_at'           => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_mapel', 'mapel', 'id');
        $this->forge->createTable('nilai_rata_rata_siswa');
    }

    public function down()
    {
        $this->forge->dropTable('nilai_rata_rata_siswa');
    }
}
