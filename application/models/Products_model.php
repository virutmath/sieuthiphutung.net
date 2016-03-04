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

    public function getDetail($id, $field = '*') {
        return $this->fields($field)
                    ->with('categories')
                    ->with('originals')
                    ->with('brands')
                    ->where('id',intval($id))->get();
    }

    public function getListBySuggest($limit) {
        $list = $this->fields('id,name,image,price')
                    ->with('originals')
                    ->where('status',self::PRODUCT_ACTIVE)
                    ->limit($limit)
                    ->get_all();
        return $list;
    }

    public function getAllProducts($page, $pageSize, $date_from = null, $date_to = null) {
        $page = intval($page);
        $page = $page > 1 ? $page : 1;
        $pageSize = intval($pageSize);
        $pageSize = $pageSize > 1 ? $pageSize : 1;
        $list = $this->fields('id,name,status,image,active,updated_at')
                    ->with('categories')
                    ->with('originals')
                    ->with('brands')
                    ->limit($pageSize, ($page - 1) * $pageSize)
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