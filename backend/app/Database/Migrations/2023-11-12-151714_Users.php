<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'userId' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'userName' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'userPassword' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'userRole' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'userAccess' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('userId', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        
    }
}
