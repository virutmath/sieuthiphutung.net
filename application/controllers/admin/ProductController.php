<?php

/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 3/4/2016
 * Time: 9:46 PM
 */
class ProductController extends AdminController
{
    protected $pageSize = 15;
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
        $dataView = [
            'current_page'=>'products',
            'list'=>$this->Product_getAllProducts($page, $this->pageSize),
        ];
        //count record for paging
        $count_all = $this->Product_countAll();
        //get all category
        $all_categories = $this->Category_getAllCategories();
        $list_categories = $this->parseCategories($all_categories);
        $dropdown_categories = [];
        foreach($list_categories as $category) {
            $dropdown_categories[$category->id] = $category->name;
        }
        //generate table admin
        $table = new TableAdmin($dataView['list']);
        $table->paging($count_all,$this->pageSize);
        $table->column('id',trans('admin.page.products.id'));
        $table->column('name',trans('admin.page.products.product-name'));
        $table->columnDropdown('category_id','Danh mục',$dropdown_categories);
        $table->column('updated_at', trans('admin.page.products.updated-at'),'datetime');
        $table->column('price', 'Giá');
        $table->columnDropdown('status', trans('admin.page.products.status'),$this->product_status);
        $table->column('best_seller', 'Bán chạy','checkbox');
        $table->column('view', 'Lượt xem');
        $table->column('active', trans('admin.page.products.active'),'checkbox');
        $table->column('id','Edit','edit');
        $table->column('id','Delete','delete');
        $table->setEditLink(RewriteUrlFn\admin_product_edit('$id'));
        $dataView['tableAdmin'] = $table->render();
        
        $this->blade->render($this->admin_path . '.products.index',$dataView);
    }

    public function add() {
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
        $this->blade->render($this->admin_path . '.products.add',$data_view);
    }

    public function postAdd() {
        $data = [
            'name' => $this->input->post('name', TRUE),
            'code' => $this->input->post('code', TRUE),
            'category_id' => $this->input->post('category_id'),
            'original_id' => $this->input->post('original_id'),
            'brand_id' => $this->input->post('brand_id'),
            'active' => $this->input->post('active'),
            'hot' => $this->input->post('hot'),
            'trending' => $this->input->post('trending'),
            'feature' => $this->input->post('feature'),
            'best_seller' => $this->input->post('best_seller'),
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
        if($this->Product_addProduct($data)) {
            //save image
            $data['image'] AND $this->save_image_from_tmp_upload($data['image']);
            redirect( RewriteUrlFn\admin_product_add() );
        }
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
            'active' => $this->input->post('active') ?: 0,
            'hot' => $this->input->post('hot') ?: 0,
            'trending' => $this->input->post('trending') ?: 0,
            'feature' => $this->input->post('feature') ?: 0,
            'best_seller' => $this->input->post('best_seller') ?: 0,
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
        }
        redirect( RewriteUrlFn\admin_product_edit($id) );
    }
    public function ajaxDelete() {
        $this->checkPermission('delete');
        $record_id = $this->input->post('record',TRUE);
        //delete category
        $result = $this->Product_deleteProduct($record_id);
        if($result) {
            echo json_encode(['success'=>'Bạn đã xóa thành công']);
            die();
        }else{
            echo json_encode(['error'=>'Không thể thực hiện tác vụ này']);
            die();
        }
    }
    public function ajaxUpdate() {
        $arrayReturn = []; 
        $this->checkPermission('edit');
        $recordId = $this->input->post('record',TRUE);
        $field = $this->input->post('field',TRUE);
        switch ($field) {
            case 'best_seller':
            case 'active':
                $result = $this->Product_toggleBooleanField($field, $recordId);
                if($result) {
                    $arrayReturn['success'] = 1;
                    echo json_encode($arrayReturn);
                }else{
                    http_response_code(400);
                    $arrayReturn['error'] = 'Bad request';
                    echo json_encode($arrayReturn);
                }
                break;
            case 'status':
                $status = $this->input->post('status',TRUE);
                if(!array_key_exists($status,$this->product_status)) {
                    http_response_code(400);
                    $arrayReturn['error'] = 'Bad request';
                    echo json_encode($arrayReturn);
                    break;
                }
                $result = $this->Product_updateStatus($status, $recordId);
                if($result) {
                    $arrayReturn['success'] = 1;
                    echo json_encode($arrayReturn);
                }else{
                    http_response_code(400);
                    $arrayReturn['error'] = 'Bad request';
                    echo json_encode($arrayReturn);
                }
                break;
            case 'category_id':
                $cat = $this->input->post('category_id',TRUE);
                $result = $this->Product_updateCategory($cat, $recordId);
                if($result) {
                    $arrayReturn['success'] = 1;
                    echo json_encode($arrayReturn);
                }else{
                    http_response_code(400);
                    $arrayReturn['error'] = 'Bad request';
                    echo json_encode($arrayReturn);
                }
                break;
        }
        exit();
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