<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kendaraan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kendaraan_id' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'plat_nomor' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'jenis_kendaraan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'nama_kendaraan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'bbm' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'jadwal_service' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'gambar_kendaraan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'pemilik' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('kendaraan_id', true);
        $this->forge->createTable('kendaraan');
    }

    public function down()
    {
        $this->forge->dropTable('kendaraan');
    }
}
