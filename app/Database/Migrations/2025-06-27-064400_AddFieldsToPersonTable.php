<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToPersonTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('persons', [
        	'role' => [
	        	'type' => 'VARCHAR',
                'constraint' => '20',
	        	'null' => false
	        ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('persons', 'role');
    }
}
