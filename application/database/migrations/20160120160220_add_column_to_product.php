<?php
/**
 * Migration: add_column_to_product
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2016/01/20 16:02:20
 */
class Migration_add_column_to_product extends CI_Migration {

	public function up()
	{
		$fields = [
			'price'=>[
				'type' => 'INT',
                'NULL'=> TRUE
			],
            'description'=>[
                'type'=>'TEXT',
                'NULL'=>TRUE
            ],
            'image'=>[
                'type'=>'VARCHAR',
                'constraint'=>255
            ]
		];
        $this->dbforge->add_column('products',$fields);
	}

	public function down()
	{
        $this->dbforge->drop_column('products',['price','description','image']);
	}
}
