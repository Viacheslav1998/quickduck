<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToCommentsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('comments', [
        	'reaction' => [
        		'type' => 'VARCHAR',
        		'constraint' => '50'
        	],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('comments', 'reaction');
    }
}
