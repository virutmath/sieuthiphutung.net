<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DashboardController extends AdminController {

    public function __construct() {
        parent::__construct();
    }


    public function index() {
        $data_view = [];
        $this->blade->render($this->admin_path . '.index',$data_view);
    }
}
