<?php
/**
 * Migration: add_some_special_column_for_product
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2016/03/22 14:47:33
 */
class Migration_add_some_special_column_for_product extends CI_Migration {

	public function up()
	{
//		// Creating a table
//		$this->dbforge->add_field(array(
//			'blog_id' => array(
//				'type' => 'INT',
//				'constraint' => 11,
//				'auto_increment' => TRUE
//			),
//			'blog_title' => array(
//				'type' => 'VARCHAR',
//				'constraint' => 100,
//			),
//			'blog_author' => array(
//				'type' =>'VARCHAR',
//				'constraint' => '100',
//				'default' => 'King of Town',
//			),
//			'blog_description' => array(
//				'type' => 'TEXT',
//				'null' => TRUE,
//			),
//		));
//		$this->dbforge->add_key('blog_id', TRUE);
//		$this->dbforge->create_table('blog');

//		// Adding a Column to a Table
//		$fields = array(
//			'preferences' => array('type' => 'TEXT')
//		);
//		$this->dbforge->add_column('table_name', $fields);
        $fields = [
            //best seller product
            'best_seller'=> [
                'type'=>'TINYINT',
                'default'=>0
            ],
            //trending product
            'trending'=> [
                'type'=>'TINYINT',
                'default'=>0
            ],
            //hot
            'hot'=> [
                'type'=>'TINYINT',
                'default'=>0
            ],
            //feature
            'feature'=> [
                'type'=>'TINYINT',
                'default'=>0
            ],
            //count view
            'view'=> [
                'type'=>'INT',
                'default'=>0
            ]
        ];
        $this->dbforge->add_column('products', $fields);
	}

	public function down()
	{
//		// Dropping a table
//		$this->dbforge->drop_table('blog');

//		// Dropping a Column From a Table
//		$this->dbforge->drop_column('table_name', 'column_to_drop');
        $this->dbforge->drop_column('products','view');
        $this->dbforge->drop_column('products','feature');
        $this->dbforge->drop_column('products','hot');
        $this->dbforge->drop_column('products','trending');
        $this->dbforge->drop_column('products','best_seller');
	}
}
