<?php
/**
 * Migration: create_categories_table
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2015/12/05 07:21:16
 */
class Migration_create_categories_table extends CI_Migration {

	public function up()
	{
		// Creating a table
		$this->dbforge->add_field('id');
		$this->dbforge->add_field([
			'name'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			]
		]);
		$this->dbforge->add_field([
			'parent_id'=>[
				'type'=>'INT',
				'default'=>0
			]
		]);
		$this->dbforge->add_field([
			'active'=>[
				'type'=>'TINYINT',
				'default'=>1
			]
		]);
		$this->dbforge->add_field([
			'title'=>[
				'type'=>'VARCHAR',
				'NULL'=>TRUE,
				'constraint'=>255
			]
		]);
		$this->dbforge->add_Field([
			'description'=>[
				'type'=>'VARCHAR',
				'NULL'=>TRUE,
				'constraint'=>255
			]
		]);
		$this->dbforge->add_field([
			'keyword'=>[
				'type'=>'VARCHAR',
				'NULL'=>TRUE,
				'constraint'=>255
			]
		]);
		$this->dbforge->add_field([
			'image'=>[
				'type'=>'VARCHAR',
				'NULL'=>TRUE,
				'constraint'=>255
			]
		]);
		$this->dbforge->add_field([
			'created_at' => [
				'type'=>'INT',
				'NULL'=>TRUE,
			],
			'updated_at' => [
				'type'=>'INT',
				'NULL'=>TRUE,
			],
			'deleted_at'=>[
				'type'=>'INT',
				'NULL'=>TRUE,
			]
		]);
		$this->dbforge->create_table('categories');
	}

	public function down()
	{
		$this->dbforge->drop_table('categories');
	}

}
