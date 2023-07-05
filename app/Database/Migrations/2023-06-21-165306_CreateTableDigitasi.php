<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableDigitasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_digitasi'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_file_digitasi'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'status'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'deleted_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_digitasi');
        $this->forge->createTable('tb_digitasi', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tb_digitasi');
    }
}
