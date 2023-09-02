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
                'role' => 'role-admin-64f30bc34e9a66.53033155',
            ],
            [
                'user_id' => uniqid('user-', true),
                'username'    => 'agreement1',
                'email' => 'agreement1@gmail.com',
                'password' => password_hash('agreement1', PASSWORD_DEFAULT),
                'nama_user' => 'Bambang Sudarmadji',
                'hp_user' => '082132229938',
                'role' => 'role-agreement1-64f30bc34e9b38.61238229',
            ],
            [
                'user_id' => uniqid('user-', true),
                'username'    => 'agreement2',
                'email' => 'agreement2@gmail.com',
                'password' => password_hash('agreement2', PASSWORD_DEFAULT),
                'nama_user' => 'Tantowi Sihardjo',
                'hp_user' => '082435533332',
                'role' => 'role-agreement2-64f30bc34e9b56.12454611',
            ],
        ];

        // Using Query Builder
        $this->db->table('user')->insertBatch($data);
    }
}
