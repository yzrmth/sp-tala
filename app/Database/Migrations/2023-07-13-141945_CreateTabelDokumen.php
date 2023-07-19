<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTabelDokumen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dokumen'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'fk_jenis_dokumen'       => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'nama_dokumen'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'keterangan'       => [
                'type'           => 'text',
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'deleted_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_dokumen');
        $this->forge->createTable('tb_dokumen', TRUE);
        $this->forge->addForeignKey('fk_jenis_dokumen', 'tb_dokumen', 'id_jenis_dokumen', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropTable('tb_dokumen');
    }
}
