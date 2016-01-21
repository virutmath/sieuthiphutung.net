<?php

/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 1/21/2016
 * Time: 9:24 PM
 */
class Files_model extends MY_Model
{
    public $table = 'files';
    public $primary_key = 'id';

    public function __construct() {
        $this->soft_deletes = TRUE;
        parent::__construct();
    }
}