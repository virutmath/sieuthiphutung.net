<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DashboardController extends MY_Controller {

    public function __construct() {
        parent::__construct();

    }


    public function index() {
        $data_view = [];
        $this->blade->render($this->admin_path . '.index',$data_view);
    }
}