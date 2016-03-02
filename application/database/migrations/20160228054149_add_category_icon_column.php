<?php
/**
 * Migration: add_category_icon_column
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2016/02/28 05:41:49
 */
class Migration_add_category_icon_column extends CI_Migration {

	public function up()
	{
        $this->dbforge->add_column('categories',[
            'icon'=>[
                'type'=>'INT'
            ]
        ]);
	}

	public function down()
	{
//		// Dropping a table
//		$this->dbforge->drop_table('blog');

//		// Dropping a Column From a Table
		$this->dbforge->drop_column('categories', 'icon');
	}

}
