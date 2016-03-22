<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require BASEPATH . '../vendor/autoload.php';

class MY_Controller extends CI_Controller {

    public $is_pjax = false;
    public $config_upload = [];
    public $view_path = '';
    public $admin_path = 'admin';
    public $template_name = 'thebox';
    private $mobile_detect;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('blade');
        $this->load->library('encryption');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper('translate');
        $this->load->helper('string');
        $this->load->helper('form');
        $this->load->helper('template');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper('common');
        $this->load->helper('generate_url');
        $this->load->helper('rewrite_url');
        $this->output->enable_profiler($this->config->item('enable_profiler'));



        $this->mobile_detect = new \Detection\MobileDetect();
        if($this->mobile_detect->isMobile()) {
            //template declare
            $this->view_path = $this->template_name . '.web';
        }else{
            $this->view_path = $this->template_name . '.web';
        }

        $this->encryption->initialize([
            'cipher' => 'aes-256',
            'mode' => 'ctr',
            'key' => hex2bin('124d65cd6a939e1116425c5d47f8a2e9')
        ]);

        //check pjax
        if($this->input->is_ajax_request()) {
            $headers = $this->input->request_headers();
            if(isset($headers['X-PJAX'])) {
                $this->is_pjax = true;
            }
        }
    }
    public function __call($method, $arguments) {
        if(starts_with($method, ['Brand_','Product_','Category_','Original_'])) {
            $model = explode('_',$method);
            return call_user_func_array([$this->$model[0],$model[1]],$arguments);
        } else {
            show_error('no such a method: ' . $method);
        }
    }

    protected function save_image_from_tmp_upload($filename) {
        if(!$filename) {
            return;
        }
        $path_dir = generate_image_dir_upload($filename,'original');
        copy(TEMP_UPLOAD_DIR . '/' .$filename,$path_dir . $filename);
    }
}
//require base controller
require_once APPPATH . 'controllers/AuthController.php';
require_once APPPATH . 'controllers/AdminController.php';
