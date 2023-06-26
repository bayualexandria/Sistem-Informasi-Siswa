<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableProfileSekolah extends Migration
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
            'nama_sekolah' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'alamat' => [
                'type' => 'text',
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ], 'logo' => [
                'type' => 'text',
            ],
            'kepala_sekolah' => [
                'type'          => 'VARCHAR',
                'constraint' => 50
            ],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('profile_sekolah');
    }

    public function down()
    {
        $this->forge->dropTable('profile_sekolah');
    }
}
