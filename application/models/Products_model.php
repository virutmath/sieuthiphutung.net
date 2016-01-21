<?php

/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 1/20/2016
 * Time: 9:44 PM
 */
class Products_model extends MY_Model
{
    public $table = 'products';
    public $primary_key = 'id';

    public function __construct() {
        $this->soft_deletes = TRUE;
        $this->has_one['categories'] = [
            'foreign_model'=>'Categories_model',
            'foreign_table'=>'categories',
            'foreign_key'=>'id',
            'local_key'=>'category_id'
        ];
        $this->has_one['originals'] = [
            'foreign_model'=>'Originals_model',
            'foreign_table'=>'originals',
            'foreign_key'=>'id',
            'local_key'=>'original_id'
        ];
        $this->has_one['brands'] = [
            'foreign_model'=>'Brands_model',
            'foreign_table'=>'brands',
            'foreign_key'=>'id',
            'local_key'=>'brand_id'
        ];
        parent::__construct();
    }
}