<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPersonFieldImage extends Migration
{
    public function up()
    {
        $this->forge->addColumn('persons', [
            'imagen' => [
                'type' => 'VARCHAR',
                'constraint' => '300',
                'default' => 'null'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('person', 'imagen');
    }
}
