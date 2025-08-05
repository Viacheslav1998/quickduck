<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
        	'id' => [
	        	'type' => 'INT',
	        	'constraint' => 5,
	        	'unsigned' => true,
	        	'auto_increment' => true,
	        ],
	        'post_name' => [
	        	'type' => 'VARCHAR',
	        	'constraint' => '255',
	        ],
	        'person_name' => [
	        	'type' => 'VARCHAR',
	        	'constraint' => '255',
	        ],
	        'comment' => [
	        	'type' => 'VARCHAR',
	        	'constraint' => '500',
	        ],
	        'user_id' => [
	        	'type' => 'INT',
	        	'constraint' => 5,
	        	'unsigned' => true,
	        ],
	        'post_id' => [
	        	'type' => 'INT',
	        	'constraint' => 5,
	        	'unsigned' => true,
	        ],
	        'status' => [
	        	'type' => 'VARCHAR',
	        	'constraint' => '255',
	        	'default' => 'verification',
	        ],
	        'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('comments');
    }

    public function down()
    {
        $this->forge->dropTable('comments');
    }
}
