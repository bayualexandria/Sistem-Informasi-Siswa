<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class StatusLogin extends Seeder
{
    public function run()
    {
        $data = [
            [
                'status' => 'Admin',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'status' => 'Guru',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'status' => 'Siswa',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];

        $this->db->table('status')->insertBatch($data);
    }
}
