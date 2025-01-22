<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kelas' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nama_kelas' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'deskripsi_kelas' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
        ]);
        $this->forge->addKey('id_kelas', true);
        $this->forge->createTable('kelas');

        // Adding foreign key to 'users' table
        $this->forge->addColumn('users', [
            'id_kelas' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
                'after' => 'jenis_kelamin'
            ]
        ]);

        $this->db->query('ALTER TABLE users ADD CONSTRAINT fk_users_kelas FOREIGN KEY (id_kelas) REFERENCES kelas(id_kelas) ON DELETE SET NULL ON UPDATE CASCADE');
    }

    public function down()
    {
        // Drop foreign key and column from 'users' table
        $this->forge->dropForeignKey('users', 'fk_users_kelas');
        $this->forge->dropColumn('users', 'id_kelas');

        // Drop 'kelas' table
        $this->forge->dropTable('kelas');
    }
}
