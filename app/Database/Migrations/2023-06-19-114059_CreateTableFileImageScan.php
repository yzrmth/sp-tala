<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableFileImageScan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_scan'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_file'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'deleted_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_scan');
        $this->forge->createTable('tb_image_scan', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tb_image_scan');
    }
}
