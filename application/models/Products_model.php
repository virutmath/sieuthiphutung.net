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

    const PRODUCT_ACTIVE = 1;
    const PRODUCT_INACTIVE = 2;

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

    public function getListByBrand($brand_id,$limit) {
        $list = $this->fields('id,name,image,price')
                    ->with('originals')
                    ->where('status',self::PRODUCT_ACTIVE)
                    ->where('brand_id',$brand_id)
                    ->limit($limit)
                    ->get_all();
        return $list;
    }

    public function getListBySuggest($limit) {
        $list = $this->fields('id,name,image,price')
                    ->with('originals')
                    ->where('status',self::PRODUCT_ACTIVE)
                    ->limit($limit)
                    ->get_all();
        return $list;
    }

    public function getNewProduct($limit) {
        $list = $this->fields('id,name,image,price')
                    ->with('originals')
                    ->where('status',self::PRODUCT_ACTIVE)
                    ->where_between('created_at',[time() - 7*86400, time()])
                    ->order_by('id','DESC')
                    ->limit($limit)
                    ->get_all();
        return $list;
    }
}