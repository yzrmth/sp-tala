<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnFileDokumen extends Migration
{
    public function up()
    {
        $fields = [
            'file_dokumen' => [
                'type'      => 'VARCHAR',
                'constraint'     => 225,
                'after' => 'keterangan',
                'null' => true,
            ],
        ];

        $this->forge->addColumn('tb_dokumen', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('tb_dokumen', 'file_dokumen');
    }
}
