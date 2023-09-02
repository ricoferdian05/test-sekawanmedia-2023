<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Driver extends Seeder
{
    public function run()
    {
        $data = [
            [
                'driver_id' => uniqid('driver-', true),
                'nama_driver'    => 'Muhammad Antono',
                'hp_driver'    => '08123456789',
            ],
            [
                'driver_id' => uniqid('driver-', true),
                'nama_driver'    => 'Andi Nur Marco',
                'hp_driver'    => '08332130039',
            ],
            [
                'driver_id' => uniqid('driver-', true),
                'nama_driver'    => 'Ahmad Fernandes Utama',
                'hp_driver'    => '08345243554',
            ],
            [
                'driver_id' => uniqid('driver-', true),
                'nama_driver'    => 'Jonathan Cahyo Nugroho',
                'hp_driver'    => '08234314312',
            ],
            [
                'driver_id' => uniqid('driver-', true),
                'nama_driver'    => 'Billy Handoko Suryo',
                'hp_driver'    => '081341343133',
            ],
        ];

        // Using Query Builder
        $this->db->table('driver')->insertBatch($data);
    }
}
