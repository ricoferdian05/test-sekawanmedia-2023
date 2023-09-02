<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'username' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'nama_user' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'hp_user' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'role' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
