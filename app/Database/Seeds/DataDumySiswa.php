<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class DataDumySiswa extends Seeder
{

    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            $ni = $faker->nik();
            mkdir('assets/img/profile/siswa/' . $ni);
            $data = [
                'no_induk' => $ni,
                'nama' => $faker->name,
                'jenis_kelamin' => $faker->title('Laki-laki' | 'Perempuan'),
                'no_hp' => $faker->phoneNumber,
                'image_profile' => $ni . '/profile.png',
                'alamat' => $faker->address,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ];
            // $from = 'assets/profile.png';
            // $to = 'assets/img/profile/siswa/' . $ni;
            // copy($from, $to);

            $this->db->table('siswa')->insert($data);
        }
    }
}
