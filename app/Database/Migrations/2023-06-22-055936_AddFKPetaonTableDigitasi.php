<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFKPetaonTableDigitasi extends Migration
{
    public function up()
    {
        $fields = [
            'fk_peta' => [
                'type'      => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'after' => 'status',
                'null' => true,
            ],
        ];

        $this->forge->addColumn('tb_digitasi', $fields);
        $this->forge->addForeignKey('fk_peta', 'tb_peta_scan', 'id_peta', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropColumn('tb_digitasi', 'fk_peta');
        $this->forge->dropForeignKey('tb_digitasi', 'fk_peta');
    }
}
