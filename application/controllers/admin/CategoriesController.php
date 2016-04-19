<?php

class CategoriesController extends AdminController {
    protected $pageSize = 15;
    public function __construct() {
        parent::__construct();
        $this->load->model('categories_model','Category');
    }

    public function index() {
        $page = intval($this->input->get('page',TRUE));
        $data_view = [
            'current_page'=>'categories'
        ];
        $all_cat = $this->Category_getAllCategories();
        $data_view['list'] = $this->parseCategories($all_cat);
        $listIcon = $this->Category_listIcon();
        $dropdownIcon = [];
        foreach ($listIcon as $icon) {
            $dropdownIcon[$icon] = $icon;
        }
        //ddd($data_view['list']);
        $table = new TableAdmin($data_view['list']);
        $table->column('id','ID');
        $table->column('image','Ảnh trang chủ','image');
        $table->column('name','Tên danh mục');
        $table->columnDropdown('icon','Biểu tượng',$dropdownIcon);
        $table->column('active','Kích hoạt','checkbox');
        $table->column('id','Edit','edit');
        $table->column('id','Delete','delete');
        $table->setEditLink(RewriteUrlFn\admin_category_edit('$id'));
        $data_view['tableAdmin'] = $table->render();
        $this->blade->render($this->admin_path . '.categories.index',$data_view);
    }


    public function add() {
        $all_cat = $this->Category_getAllCategories();
        $data_view = [
            'current_page'=>'categories',
            'list_icon'=>$this->Category_listIcon(),
            'list_cat'=>$this->parseCategories($all_cat)
        ];
        $this->blade->render($this->admin_path . '.categories.add',$data_view);
    }
    public function postAdd() {
        $data = [
            'name' => $this->input->post('category_name', TRUE),
            'parent_id' => $this->input->post('category_parent'),
            'icon' => $this->input->post('category_icon'),
            'active' => $this->input->post('category_active'),
            'description' => $this->input->post('category_description', TRUE),
            'keyword' => $this->input->post('category_keyword', TRUE),
            'title' => $this->input->post('category_title', TRUE)
        ];
        $image_post= $this->input->post('image', TRUE);
        if($image_post) {
            $data['image'] = $image_post;
        }
        $result = $this->Category_addCategory($data);
        if($result) {
            //save image
            $data['image'] AND $this->save_image_from_tmp_upload($data['image']);
            redirect( RewriteUrlFn\admin_category() );
        }
    }

    public function edit($id) {
        $all_cat = $this->Category_getAllCategories();
        $data_view = [
            'current_page'=>'categories',
            'list_icon'=>$this->Category_listIcon(),
            'list_cat'=>$this->parseCategories($all_cat)
        ];
        $data_view['detail'] = $this->Category_getDetail($id);
        $this->blade->render($this->admin_path . '.categories.edit',$data_view);
    }
    public function postEdit($id) {
        $data = [
            'name' => $this->input->post('category_name', TRUE),
            'parent_id' => $this->input->post('category_parent'),
            'icon' => $this->input->post('category_icon'),
            'active' => $this->input->post('category_active'),
            'description' => $this->input->post('category_description', TRUE),
            'keyword' => $this->input->post('category_keyword', TRUE),
            'title' => $this->input->post('category_title', TRUE)
        ];
        $image_post= $this->input->post('image', TRUE);
        if($image_post) {
            $data['image'] = $image_post;
        }
        $result = $this->Category_editCategory($id, $data);
        if($result) {
            //save image
            $data['image'] AND $this->save_image_from_tmp_upload($data['image']);
            redirect( RewriteUrlFn\admin_category_edit($id) );
        }
    }
    public function delete() {
        $this->checkPermission('delete');
        $record_id = $this->input->post('record',TRUE);
        //delete category
        $result = $this->Category_deleteCategory($record_id);
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
            case 'active':
                $result = $this->Category_toggleBooleanField($field, $recordId);
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
        die();
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