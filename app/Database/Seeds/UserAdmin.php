<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserAdmin extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_BCRYPT),
            'status_id' => 1,
            'is_active' => 1,
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ];

        $this->db->table('users')->insert($data);
    }
}
