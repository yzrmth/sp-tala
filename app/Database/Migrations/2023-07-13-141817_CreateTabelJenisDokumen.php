<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTabelJenisDokumen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis_dokumen'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'jenis_dokumen'       => [
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

        $this->forge->addKey('id_jenis_dokumen');
        $this->forge->createTable('tb_jenis_dokumen', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tb_jenis_dokumen');
    }
}
