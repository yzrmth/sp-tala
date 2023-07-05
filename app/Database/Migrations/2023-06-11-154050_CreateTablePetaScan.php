<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePetaScan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peta'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'proyek'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'nomor_peta'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'tahun' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'kecamatan' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'desa' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'file_scan' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'deleted_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_peta');
        $this->forge->createTable('tb_petan_scan', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tb_peta_scan');
    }
}
