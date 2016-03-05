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
    const PRODUCT_INACTIVE = 0;

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

    public function editProduct($id, $data) {
        $update_data = [];
        if(isset($data['name'])) {
            $update_data['name'] = htmlentities($data['name']);
        }
        if(isset($data['code'])) {
            $update_data['code'] = htmlentities($data['code']);
        }
        if(isset($data['category_id'])) {
            $update_data['category_id'] = intval($data['category_id']);
        }
        if(isset($data['original_id'])) {
            $update_data['original_id'] = intval($data['original_id']);
        }
        if(isset($data['status'])) {
            $update_data['status'] = intval($data['status']);
        }
        if(isset($data['price'])) {
            $update_data['price'] = intval($data['price']);
        }
        if(isset($data['active'])) {
            $update_data['active'] = $data['active'] ? self::PRODUCT_ACTIVE : self::PRODUCT_INACTIVE;
        }
        if(isset($data['description'])) {
            $update_data['description'] = $data['description'];
        }
        if(isset($data['image'])) {
            $update_data['image'] = htmlentities($data['image']);
        }
        if(isset($data['note'])) {
            $update_data['note'] = htmlentities($data['note']);
        }
        if(isset($data['keyword'])) {
            $update_data['keyword'] = htmlentities($data['keyword']);
        }
        if(isset($data['title'])) {
            $update_data['title'] = htmlentities($data['title']);
        }
        return $this->update($update_data,$id);
    }
}