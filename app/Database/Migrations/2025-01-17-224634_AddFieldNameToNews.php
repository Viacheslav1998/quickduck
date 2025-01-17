<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldNameToNews extends Migration
{
    public function up()
    {
        $this->forge->addColumn('news', [
        	'name' => [
        		'type' => 'VARCHAR',
        		'constraint' => 255,
        		'null' => false,
        	],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('news', 'name');
    }
}


