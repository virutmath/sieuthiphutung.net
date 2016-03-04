<?php

class CategoriesController extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('categories_model','Category');
    }

    public function index() {
        $data_view = [
            'current_page'=>'categories'
        ];
        $all_cat = $this->Category_getAllCategories();
        $data_view['list'] = $this->parseCategories($all_cat);
        //ddd($data_view['list']);
        $this->blade->render($this->admin_path . '.categories.index',$data_view);
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

        $result = $this->Category_editCategory($id, $data);
        if($result) {
            redirect( REWRITE_URL\admin_category_edit($id) );
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