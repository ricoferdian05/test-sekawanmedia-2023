<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StatusPemesanan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'status'    => 'Belum Disetujui',
            ],
            [
                'status'    => 'Disetujui Level 1',
            ],
            [
                'status'    => 'Selesai',
            ],
        ];

        // Using Query Builder
        $this->db->table('status_pemesanan')->insertBatch($data);
    }
}
