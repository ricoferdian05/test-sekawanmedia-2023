<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusPemesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'status_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'auto_increment' => true,
            ],
            'status' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
        ]);
        $this->forge->addKey('status_id', true);
        $this->forge->createTable('status_pemesanan');
    }

    public function down()
    {
        $this->forge->dropTable('status_pemesanan');
    }
}
