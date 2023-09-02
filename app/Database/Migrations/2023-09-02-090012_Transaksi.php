<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'transaksi_id' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'kendaraan_id' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'driver_id' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'nama_pemesan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'hp_pemesan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'tanggal_pemesanan' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'tanggal_kembali' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'status' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
        ]);
        $this->forge->addKey('transaksi_id', true);
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
