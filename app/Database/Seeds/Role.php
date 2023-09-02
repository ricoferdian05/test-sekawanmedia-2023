<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Role extends Seeder
{
    public function run()
    {
        $data = [
            [
                'role_id' => uniqid('role-admin-', true),
                'role'    => 'Admin',
            ],
            [
                'role_id' => uniqid('role-agreement1-', true),
                'role'    => 'Agreement Level 1',
            ],
            [
                'role_id' => uniqid('role-agreement2-', true),
                'role'    => 'Agreement Level 2',
            ],
        ];

        // Using Query Builder
        $this->db->table('role')->insertBatch($data);
    }
}
