<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNewsTagsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
        	'news_id' => [
        		'type' => 'INT',
        		'unsigned' => true,
        		'null' => false,
        	],
        	'tag_id' => [
        		'type' => 'INT',
        		'unsigned' => true,
        		'null' => false,
        	],
        ]);

        // set Primary
        $this->forge->addKey(['news_id', 'tag_id'], true);

        // add foreign key
        $this->forge->addForeignKey('news_id', 'news', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tag_id', 'tags', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('news_tags');
    }

    public function down()
    {
    	$this->forge->dropTable('news_tags', true);
    }
}
