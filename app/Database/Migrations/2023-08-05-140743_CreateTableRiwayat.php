<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableRiwayat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_riwayat'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'fk_user' => [
                'type'      => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'       => true,
            ],
            'fk_peta' => [
                'type'      => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'nama_file' => [
                'type'      => 'varchar',
                'constraint'     => 255,
            ],
            'jenis_file' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'aksi' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'tanggal' => [
                'type'           => 'date',
            ],
            'keterangan' => [
                'type'           => 'text',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'deleted_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_riwayat');
        $this->forge->createTable('tb_riwayat', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tb_riwayat');
    }
}
