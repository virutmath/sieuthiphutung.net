<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require BASEPATH . '../vendor/autoload.php';

class MY_Controller extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('blade');
        $this->load->helper('translate');
        $this->load->helper('template');
    }
}