<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Driver extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'driver_id' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'nama_driver' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'hp_driver' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('driver_id', true);
        $this->forge->createTable('driver');
    }

    public function down()
    {
        $this->forge->dropTable('driver');
    }
}
