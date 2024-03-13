<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
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
            'itemname' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'partnumber' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'compatibility' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'marketprice' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'boughtprice' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'sellingprice' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'initialquantity' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'currentquantity' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'branch' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'lastdateupdated' => [
                'type' => 'DATE',
            ],
            'supplier' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('products');
    }

    public function down()
    {
        
    }
}
