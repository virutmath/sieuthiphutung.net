<?php
/**
 * Migration: create_admin_users_table
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2015/12/05 07:42:38
 */
class Migration_create_admin_users_table extends CI_Migration {

	public function up()
	{
		// Creating a table
		$this->dbforge->add_field('id');
		$this->dbforge->add_field([
			'username'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			]
		]);
		$this->dbforge->add_field([
			'fullname'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			]
		]);
		$this->dbforge->add_field([
			'email'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
				'NULL'=>TRUE
			]
		]);
		$this->dbforge->add_field([
			'password'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			]
		]);
		$this->dbforge->add_field([
			'hash_key'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			]
		]);
		$this->dbforge->add_field([
			'super_admin'=>[
				'type'=>'TINYINT',
				'default'=>0
			]
		]);
		$this->dbforge->add_field([
			'created_at' => [
				'type'=>'DATETIME',
				'NULL'=>TRUE,
			],
			'updated_at' => [
				'type'=>'DATETIME',
				'NULL'=>TRUE,
			],
			'deleted_at'=>[
				'type'=>'DATETIME',
				'NULL'=>TRUE,
			]
		]);

		$this->dbforge->create_table('admin_users');
	}

	public function down()
	{
		$this->dbforge->drop_table('admin_users');
	}

}
