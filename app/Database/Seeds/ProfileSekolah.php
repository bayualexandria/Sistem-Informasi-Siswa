<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ProfileSekolah extends Seeder
{
    public function run()
    {
        $data = [
            'nama_sekolah' => 'XXXX XXXXXX XXXXXX',
            'alamat' => "Jl. Pasuruan No. 56,",
            'no_telp' => "0981-19866",
            'logo' => 'logo-pendidikan.png',
            'kepala_sekolah' => "Alimuddin Ismael Khoirul, S.Pd, M.Pd",
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ];

        $this->db->table('profile_sekolah')->insert($data);
    }
}
