<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldFKPeta extends Migration
{
    public function up()
    {
        $fields = [
            'fk_peta' => [
                'type'      => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'after' => 'nama_file',
                'null' => true,
            ],
        ];

        $this->forge->addColumn('tb_image_scan', $fields);
        $this->forge->addForeignKey('fk_peta', 'tb_scan_peta', 'id_peta_scan', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropColumn('tb_image_peta', 'fk_peta');
        $this->forge->dropForeignKey('tb_image_peta', 'fk_peta');
    }
}
