<?php

/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 1/20/2016
 * Time: 9:43 PM
 */
class Categories_model extends MY_Model
{
    public $table = 'categories';
    public $primary_key = 'id';

    const CAT_ACTIVE = 1;
    const CAT_INACTIVE = 2;

    public $icon_list = [
        'fa fa-caret-right',
        'fa fa-home',
        'fa fa-diamond',
        'fa fa-child',
        'fa fa-plug',
        'fa fa-tags',
        'fa fa-futbol-o',
        'fa fa-music',
        'fa fa-location-arrow',
        'fa fa-picture',
        'fa fa-motorcycle'
    ];

    public function __construct() {
        $this->soft_deletes = TRUE;

        parent::__construct();
    }

    public function getActiveCategories($parent_id = 0) {
        $list = [];
        $parent_id = intval($parent_id);
        foreach($this->fields('id,name,icon,image,has_child')
                    ->where('active',self::CAT_ACTIVE)
                    ->where('parent_id',$parent_id)
                    ->get_all() as $item) {
            $item->icon = $this->icon_list[intval($item->icon)];
            $item->image = get_picture_path($item->image);
            if($item->has_child) {
                $item->child = $this->getActiveCategories($item->id);
            }else{
                $item->child = [];
            }
            $list[] = $item;
        }
        return $list;
    }

    public function getDetail($id, $field = '*') {
        return $this->fields($field)->where('id',intval($id))->get();
    }

    public function getActiveDetail($id, $field = '*') {
        return $this->fields($field)->where('id',intval($id))->where('active',self::CAT_ACTIVE)->get();
    }

    public function getAllCategories($parent_id = 0) {
        $list = [];
        $parent_id = intval($parent_id);
        foreach($this->fields('id,name,icon,active,image,has_child')
                    ->where('parent_id',$parent_id)
                    ->get_all() as $item) {
            $item->icon = $this->icon_list[intval($item->icon)];
            $item->image = get_picture_path($item->image);
            if($item->has_child) {
                $item->child = $this->getAllCategories($item->id);
            }else{
                $item->child = [];
            }
            $list[] = $item;
        }
        return $list;
    }

    public function listIcon() {
        return $this->icon_list;
    }
}