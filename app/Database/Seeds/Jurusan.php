<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Jurusan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'jurusan' => 'Teknik Komputer & Jaringan',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'jurusan' => 'Akuntansi',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'jurusan' => 'Pemasaran',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'jurusan' => 'Administrasi Perkantoran',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];

        $this->db->table('jurusan')->insertBatch($data);
    }
}
