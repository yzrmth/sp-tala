<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFKScanImage extends Migration
{
    public function up()
    {
        $fields = [
            'fk_image_scan' => [
                'type'      => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'after' => 'file_scan',
                'null' => true,
            ],
        ];

        $this->forge->addColumn('tb_peta_scan', $fields);
        $this->forge->addForeignKey('fk_image_scan', 'tb_image_scan', 'id_scan', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropColumn('tb_peta_scan', 'fk_image_scan');
        $this->forge->dropForeignKey('tb_peta_scan', 'fk_image_scan');
    }
}
