<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RenamTablePeta extends Migration
{
    public function up()
    {
        $this->forge->renameTable('tb_petan_scan', 'tb_peta_scan');
    }

    public function down()
    {
        //
    }
}
