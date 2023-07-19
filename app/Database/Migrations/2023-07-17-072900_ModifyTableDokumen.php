<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyTableDokumen extends Migration
{
    public function up()
    {
        $fields = [
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ];
        $this->forge->modifyColumn('tb_dokumen', $fields);
    }

    public function down()
    {
        //
    }
}
