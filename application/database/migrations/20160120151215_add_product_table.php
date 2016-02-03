<?php

/**
 * Migration: add_product_table
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2016/01/20 15:12:15
 */
class Migration_add_product_table extends CI_Migration
{

    public function up()
    {
        // Creating a table
        $this->dbforge->add_field('id');
        $this->dbforge->add_field([
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
            'category_id' => [
                'type' => 'INT'
            ],
            'original_id' => [
                'type' => 'INT',
                'NULL' => TRUE
            ],
            'brand_id' => [
                'type' => 'INT'
            ],
            'note' => [
                'type' => 'TEXT'
            ],
            'status' => [
                'type' => 'TINYINT'
            ],
            'created_at' => [
                'type' => 'INT',
                'NULL' => TRUE,
            ],
            'updated_at' => [
                'type' => 'INT',
                'NULL' => TRUE,
            ],
            'deleted_at' => [
                'type' => 'INT',
                'NULL' => TRUE,
            ]
        ]);
        $this->dbforge->create_table('products');
    }

    public function down()
    {
        $this->dbforge->drop_table('products');
    }

}
