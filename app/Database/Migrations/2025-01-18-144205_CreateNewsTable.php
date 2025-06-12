<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNewsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
          'id' => [
            'type' => 'INT',
            'unsigned' => true,
            'auto_increment' => true,
          ],
          'name' => ['type' => 'VARCHAR', 'constraint' => 255],
		      'tags' => ['type' => 'VARCHAR', 'constraint' => 255],
          'title' => ['type' => 'VARCHAR', 'constraint' => 255],
          'desc' => ['type' => 'TEXT'],
          'path_to_image' => ['type' => 'VARCHAR', 'constraint' => 255],
          'created_at' => ['type' => 'DATETIME', 'null' => true],
          'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('news');
    }

    public function down()
    {
        $this->forge->dropTable('news');
    }
}
