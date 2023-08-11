<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RenameColumnfkUser extends Migration
{
    public function up()
    {
        $fields = [
            'nama_user' => [
                'name' => 'fk_user',
                'type'      => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'       => true,
            ],
        ];
        $this->forge->modifyColumn('tb_riwayat', $fields);
    }

    public function down()
    {
        //
    }
}
