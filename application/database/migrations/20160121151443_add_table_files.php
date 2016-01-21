<?php
/**
 * Migration: add_table_files
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2016/01/21 15:14:43
 */
class Migration_add_table_files extends CI_Migration {

	public function up()
	{
		// Creating a table
		$this->dbforge->add_field('id');
		$this->dbforge->add_field([
            'name'=> [
                'type'=>'VARCHAR',
                'constraint'=>255
            ],
            'alt'=>[
                'type'=>'VARCHAR',
                'constraint'=>255,
                'NULL'=>TRUE
            ],
            'description'=>[
                'type'=>'text',
                'NULL'=>TRUE
            ],
            'downloadable'=>[
                'type'=>'TINYINT',
                'default'=>1
            ],
            'download_count'=>[
                'type'=>'INT',
                'default'=>0
            ],
            'owner'=>[
                'type'=>'INT',
                'NULL'=>TRUE
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
        $this->dbforge->create_table('files');
	}

	public function down()
	{
        $this->dbforge->drop_table('files');
	}
}
