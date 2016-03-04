<?php
/**
 * Migration: add_active_column_to_product
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2016/03/04 16:16:06
 */
class Migration_add_active_column_to_product extends CI_Migration {

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
		$fields = array(
			'active' => array('type' => 'TINYINT','default'=>1)
		);
		$this->dbforge->add_column('products', $fields);
	}

	public function down()
	{

		// Dropping a Column From a Table
		$this->dbforge->drop_column('products', 'active');
	}

}
