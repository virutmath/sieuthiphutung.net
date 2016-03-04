<?php

/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 3/4/2016
 * Time: 9:46 PM
 */
class ProductController extends MY_Controller
{
    protected $pageSize = 30;
    public function __construct() {
        parent::__construct();

        $this->load->model('products_model','Product');
        $this->load->model('categories_model','Category');
        $this->load->model('originals_model','Original');
        $this->load->model('brands_model','Brand');
    }

    public function index() {
        $page = intval($this->input->get('page',TRUE));
        $data_view = [
            'current_page'=>'products',
            'list'=>$this->Product_getAllProducts($page, $this->pageSize)
        ];
        $this->blade->render($this->admin_path . '.products.index',$data_view);
    }

    public function edit($id) {
        $all_cat = $this->Category_getAllCategories();
        $all_original = $this->Original_getAll();
        $all_brand = $this->Brand_getAll();
        $data_view = [
            'current_page'=>'products',
            'list_cat'=>$this->parseCategories($all_cat),
            'list_originals'=>$all_original,
            'list_brands'=>$all_brand
        ];
        $data_view['detail'] = $this->Product_getDetail($id);
        $this->blade->render($this->admin_path . '.products.edit',$data_view);
    }
    protected function parseCategories($all_cat) {
        $list = [];
        foreach($all_cat as $cat) {
            $list[] = $cat;
            if($cat->has_child && $cat->child) {
                $parse_child = $this->parseCategories($cat->child);
                foreach($parse_child as $child) {
                    $child->name = ' |___ ' . $child->name;
                    $list[] = $child;
                }
            }
        }
        return $list;
    }
}