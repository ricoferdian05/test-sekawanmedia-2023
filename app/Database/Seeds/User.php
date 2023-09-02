<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => uniqid('user-', true),
                'username'    => 'admin',
                'email' => 'admin@gmail.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'nama_user' => 'Ahmad Suroto',
                'hp_user' => '08213123412',
                'role' => 1,
            ],
            [
                'user_id' => uniqid('user-', true),
                'username'    => 'agreement1',
                'email' => 'agreement1@gmail.com',
                'password' => password_hash('agreement1', PASSWORD_DEFAULT),
                'nama_user' => 'Bambang Sudarmadji',
                'hp_user' => '082132229938',
                'role' => 2,
            ],
            [
                'user_id' => uniqid('user-', true),
                'username'    => 'agreement2',
                'email' => 'agreement2@gmail.com',
                'password' => password_hash('agreement2', PASSWORD_DEFAULT),
                'nama_user' => 'Tantowi Sihardjo',
                'hp_user' => '082435533332',
                'role' => 3,
            ],
        ];

        // Using Query Builder
        $this->db->table('user')->insertBatch($data);
    }
}
