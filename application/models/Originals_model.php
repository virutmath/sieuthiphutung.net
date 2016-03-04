<?php

/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 1/21/2016
 * Time: 9:09 PM
 */
class Originals_model extends MY_Model
{
    public $table = 'originals';
    public $primary_key = 'id';
    public function __construct() {
        $this->soft_deletes = TRUE;
        $this->has_many['products'] = [
            'foreign_model'=>'Products_model',
            'foreign_table'=>'products',
            'foreign_key'=>'original_id',
            'local_key'=>'id'
        ];
        parent::__construct();
    }

    public function getAll() {
        return $this->fields()->get_all();
    }
}