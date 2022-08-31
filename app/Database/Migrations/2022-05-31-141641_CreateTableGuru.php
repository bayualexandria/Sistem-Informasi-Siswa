<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableGuru extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nip' => [
                'type' => 'Varchar',
                'constraint' => 100
            ],
            'nama' => [
                'type' => 'Varchar',
                'constraint' => 100
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM("Laki-laki","Perempuan")',
                'null' => FALSE,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'constraint' => 5,
                'null' => true
            ],
            'no_hp' => [
                'type' => 'Varchar',
                'constraint' => 15
            ],
            'image_profile' => [
                'type' => 'Varchar',
                'constraint' => 255,
                'null'=>true
            ],
            'alamat' => [
                'type' => 'text'
            ],
            'created_at'           => ['type' => 'datetime', 'null' => true],
            'updated_at'           => ['type' => 'datetime', 'null' => true],
            'deleted_at'           => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('guru');
    }

    public function down()
    {
        $this->forge->dropTable('guru');
    }
}
