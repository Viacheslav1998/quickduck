<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldToNews extends Migration
{
    public function up()
    {
        $this->forge->addColumn('news', [
        	'path_to_image' => [
        		'type' => 'VARCHAR',
        		'constraint' => 255,
        		'null' => true,
        	],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('news', 'path_to_image');
    }
}
