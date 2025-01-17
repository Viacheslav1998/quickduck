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
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tag_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey(['news_id', 'tag_id'], true); // Композитный первичный ключ
        $this->forge->addForeignKey('news_id', 'news', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tag_id', 'tags', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('news_tags');
    }

    public function down()
    {
        $this->forge->dropTable('news_tags');
    }
}
