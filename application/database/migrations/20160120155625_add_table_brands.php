<?php
/**
 * Migration: add_table_brands
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2016/01/20 15:56:25
 */
class Migration_add_table_brands extends CI_Migration {

	public function up()
	{
		// Creating a table
		$this->dbforge->add_field('id');
		$this->dbforge->add_field([
			'name'=> [
				'type'=>'VARCHAR',
				'constraint'=>255
			],
			'created_at' => [
				'type'=>'DATETIME',
				'NULL'=>TRUE,
			],
			'updated_at' => [
				'type'=>'DATETIME',
				'NULL'=>TRUE,
			],
			'deleted_at' => [
				'type'=>'DATETIME',
				'NULL'=>TRUE
			]
		]);
		$this->dbforge->create_table('brands');
	}

	public function down()
	{
		$this->dbforge->drop_table('brands');
	}
}
