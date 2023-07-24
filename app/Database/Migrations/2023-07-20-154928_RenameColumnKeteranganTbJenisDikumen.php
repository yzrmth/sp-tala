<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RenameColumnKeteranganTbJenisDikumen extends Migration
{
    public function up()
    {
        $fields = [
            'keterangan' => [
                'name' => 'deskripsi',
                'type' => 'text',
            ],
        ];
        $this->forge->modifyColumn('tb_jenis_dokumen', $fields);
    }

    public function down()
    {
        //
    }
}
