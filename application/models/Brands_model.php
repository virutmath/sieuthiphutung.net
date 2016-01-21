<?php

/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 1/21/2016
 * Time: 9:12 PM
 */
class Brands_model extends MY_Model
{
    public $table = 'brands';
    public $primary_key = 'id';
    public function __construct() {
        $this->soft_deletes = TRUE;
        $this->has_many['products'] = [
            'foreign_model'=>'Products_model',
            'foreign_table'=>'products',
            'foreign_key'=>'brand_id',
            'local_key'=>'id'
        ];
        parent::__construct();
    }
}