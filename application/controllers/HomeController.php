<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HomeController extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('brands_model','Brand');
        $this->load->model('products_model','Product');
        $this->load->model('categories_model','Category');
        $this->load->model('originals_model','Original');
    }


    public function index() {
        $some_brand = $this->Brand_getSomeBrand(3);
        $list_brand_tag = $this->Brand_getSomeBrand(30);
        $brand_list = [];
        foreach($some_brand as $brand) {
            $list = $this->Product_getListByBrand($brand->id,12);
            $brand->product_list = $list;
            $brand_list[] = $brand;
        }
        $suggest_list = $this->Product_getListBySuggest(20);
        $new_product_list = $this->Product_getNewProduct(20);
        $data_view = [
            'list_categories_menu'=>$this->Category_getActiveCategories(),
            'list_brand_tag'=>$list_brand_tag,
            'brand_list'=>$brand_list,
            'suggest_list'=>$suggest_list,
            'new_product_list'=>$new_product_list
        ];
//        d($data_view['list_categories_menu']);
        $this->blade->render($this->view_path . '.index',$data_view);
    }
}