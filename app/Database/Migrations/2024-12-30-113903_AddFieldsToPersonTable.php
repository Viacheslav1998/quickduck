<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToPersonTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('persons', [
        	'created_at' => [
	        	'type' => 'DATETIME',
	        	'null' => false,
	        ],
	        'updated_at' => [
	        	'type' => 'DATETIME',
	        	'null' => false,
	        ],
        ]);
    }

    public function down()
    {

        $this->forge->dropColumn('persons', 'created_at');
    	$this->forge->dropColumn('persons', 'updated_at');
    }
}
