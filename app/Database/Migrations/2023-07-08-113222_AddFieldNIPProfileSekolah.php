<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldNIPProfileSekolah extends Migration
{
    public function up()
    {
        $this->forge->addColumn('profile_sekolah', [
            'nip_kepsek' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
                'after' => 'kepala_sekolah'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('profile_sekolah', 'nip_kepsek');
    }
}
