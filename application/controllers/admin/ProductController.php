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
    const INSTOCK = 1;
    const ORDER = 2;
    const CONTACT = 3;

    protected $product_status;

    public function __construct() {
        parent::__construct();

        $this->load->model('products_model','Product');
        $this->load->model('categories_model','Category');
        $this->load->model('originals_model','Original');
        $this->load->model('brands_model','Brand');

        $this->product_status = [
            self::INSTOCK => 'Còn hàng',
            self::ORDER => "Đặt hàng",
            self::CONTACT => "Liên hệ"
        ];
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
            'list_brands'=>$all_brand,
            'list_status'=>$this->product_status
        ];
        $data_view['detail'] = $this->Product_getDetail($id);
        $this->blade->render($this->admin_path . '.products.edit',$data_view);
    }

    public function postEdit($id) {
        $data = [
            'name' => $this->input->post('name', TRUE),
            'code' => $this->input->post('code', TRUE),
            'category_id' => $this->input->post('category_id'),
            'original_id' => $this->input->post('original_id'),
            'brand_id' => $this->input->post('brand_id'),
            'active' => $this->input->post('active'),
            'status' => $this->input->post('status'),
            'price' => $this->input->post('price'),
            'note' => $this->input->post('note', TRUE),
            'description' => $this->input->post('description', TRUE),
            'keyword' => $this->input->post('keyword', TRUE),
            'title' => $this->input->post('title', TRUE),
        ];
        $image_post= $this->input->post('image', TRUE);
        if($image_post) {
            $data['image'] = $image_post;
        }
        if($this->Product_editProduct($id,$data)) {
            //save image
            $data['image'] AND $this->save_image_from_tmp_upload($data['image']);
            redirect( RewriteUrlFn\admin_product_edit($id) );
        }
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