<?php
/**
 * Migration: alter_table_files
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2016/01/24 03:39:23
 */
class Migration_alter_table_files extends CI_Migration {

	public function up()
	{
		$fields = [
            'type'=>[
                'type'=>'INT'
            ]
        ];

        $this->dbforge->add_column('files',$fields);
	}

	public function down()
	{
        $this->dbforge->drop_column('files','type');
	}

}
