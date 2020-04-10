<?php namespace App\Database\Migrations;

class AddBlog extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],
                        'date_ordered'       => [
                                'type'           => 'date',
                        ],
                        'status' => [
                                'type'           => 'varchar',
                                'constraint'    => 100,
                                'null'           => TRUE,
                        ],
                ]);
                $this->forge->addKey('id', TRUE);
                $this->forge->createTable('orders');
        }

        public function down()
        {
                $this->forge->dropTable('orders');
        }
}
