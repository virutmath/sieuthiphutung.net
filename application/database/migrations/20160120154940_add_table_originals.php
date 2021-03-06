<?php
/**
 * Migration: add_table_originals
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2016/01/20 15:49:40
 */
class Migration_add_table_originals extends CI_Migration {

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
				'type'=>'INT',
				'NULL'=>TRUE,
			],
			'updated_at' => [
				'type'=>'INT',
				'NULL'=>TRUE,
			],
			'deleted_at' => [
				'type'=>'INT',
				'NULL'=>TRUE
			]
		]);
		$this->dbforge->create_table('originals');
	}

	public function down()
	{
		$this->dbforge->drop_table('originals');
	}

}
