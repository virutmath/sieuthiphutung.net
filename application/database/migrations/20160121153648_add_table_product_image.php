<?php
/**
 * Migration: add_table_product_image
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2016/01/21 15:36:48
 */
class Migration_add_table_product_image extends CI_Migration {

	public function up()
	{
		// Creating a table
		$this->dbforge->add_field('id');
		$this->dbforge->add_field([
            'product_id'=>[
                'type'=>'INT'
            ],
            'file_id'=>[
                'type'=>'INT'
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
        $this->dbforge->create_table('product_images');
        $this->db->query('ALTER TABLE `product_images`
							ADD UNIQUE INDEX `unique_index` (`product_id`, `file_id`)');
	}

	public function down()
	{
        $this->dbforge->drop_table('product_images');
	}

}
