<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kendaraan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kendaraan_id' => uniqid('kendaraan-', true),
                'plat_nomor'    => 'N1234AB',
                'jenis_kendaraan'    => 'Angkutan Orang',
                'nama_kendaraan'    => 'Mitsubishi L 300',
                'bbm' => 20,
                'jadwal_service' => date_format(date_create('2024-08-23'), 'Y/m/d H:i:s'),
                'gambar_kendaraan'    => 'kendaraan/L-300.jpg',
                'pemilik' => 'Milik Perusahaan',
            ],
            [
                'kendaraan_id' => uniqid('kendaraan-', true),
                'plat_nomor'    => 'N3324BUE',
                'jenis_kendaraan'    => 'Angkutan Orang',
                'nama_kendaraan'    => 'Daihatsu Grand Max',
                'bbm' => 15,
                'jadwal_service' => date_format(date_create('2024-06-12'), 'Y/m/d H:i:s'),
                'gambar_kendaraan'    => 'kendaraan/Grand-Max.jpeg',
                'pemilik' => 'Milik Perusahaan',
            ],
            [
                'kendaraan_id' => uniqid('kendaraan-', true),
                'plat_nomor'    => 'N3214AAB',
                'jenis_kendaraan'    => 'Angkutan Barang',
                'nama_kendaraan'    => 'Mitsubishi Fuso',
                'bbm' => 45,
                'jadwal_service' => date_format(date_create('2024-05-11'), 'Y/m/d H:i:s'),
                'gambar_kendaraan'    => 'kendaraan/Fuso.jpeg',
                'pemilik' => 'Milik Perusahaan',
            ],
            [
                'kendaraan_id' => uniqid('kendaraan-', true),
                'plat_nomor'    => 'N3452AAE',
                'jenis_kendaraan'    => 'Angkutan Barang',
                'nama_kendaraan'    => 'Hino Dutro',
                'bbm' => 50,
                'jadwal_service' => date_format(date_create('2024-04-22'), 'Y/m/d H:i:s'),
                'gambar_kendaraan'    => 'kendaraan/Hino-Dutro.png',
                'pemilik' => 'Sewa',
            ],
            [
                'kendaraan_id' => uniqid('kendaraan-', true),
                'plat_nomor'    => 'N2223AAE',
                'jenis_kendaraan'    => 'Angkutan Barang',
                'nama_kendaraan'    => 'Scania 770',
                'bbm' => 65,
                'jadwal_service' => date_format(date_create('2024-09-02'), 'Y/m/d H:i:s'),
                'gambar_kendaraan'    => 'kendaraan/Scania-770.png',
                'pemilik' => 'Sewa',
            ],
        ];

        // Using Query Builder
        $this->db->table('kendaraan')->insertBatch($data);
    }
}
