<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Person extends Migration
{
    public function up()
    {
        $this->forge->addField([
	    	'id' => [
	        	'type' => 'INT',
	        	'constraint' => 11,
	        	'unsigned' => true,
	        	'auto_increment' => true,
	        ],
	        'name' => [
	        	'type' => 'VARCHAR',
	        	'constraint' => '255',
	        	'null' => false,
	        ],
	        'email' => [
	        	'type' => 'VARCHAR',
	        	'constraint' => '255',
	        	'null' => false,
	        ],
	        'password' => [
	        	'type' => 'VARCHAR',
	        	'constraint' => '255',
	        	'null' => false,
	        ],
	        'secret' => [
	        	'type' => 'INT',
	        	'constraint' => 5,
	        	'null' => true,
	        ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('persons');
    }

    public function down()
    {
        this->forge->dropTable('persons');
    }
}
