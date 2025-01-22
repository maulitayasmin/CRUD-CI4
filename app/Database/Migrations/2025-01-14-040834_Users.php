<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mahasiswa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nama_mahasiswa' => [
                'type' => 'Varchar',
                'constraint' => '255'
            ],
            'foto_mahasiswa' => [
                'type' => 'Varchar',
                'constraint' => '255'
            ],
            'foto_ktm' => [
                'type' => 'Varchar',
                'constraint' => '255'
            ],
            'jenis_kelamin' => [
                'type' => 'Enum',
                'constraint' => ['Pria', 'Perempuan']
            ],
        ]);
        $this->forge->addKey('id_mahasiswa', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
