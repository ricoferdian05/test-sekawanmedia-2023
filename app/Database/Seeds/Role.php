<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Role extends Seeder
{
    public function run()
    {
        $data = [
            [
                'role'    => 'Admin',
            ],
            [
                'role'    => 'Agreement Level 1',
            ],
            [
                'role'    => 'Agreement Level 2',
            ],
        ];

        // Using Query Builder
        $this->db->table('role')->insertBatch($data);
    }
}
