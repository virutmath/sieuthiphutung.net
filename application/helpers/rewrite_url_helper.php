<?php
namespace RewriteUrlFn;
defined('BASEPATH') OR exit('No direct script access allowed');
defined('PUBLICPATH') OR exit('No direct script access allowed');
define('BASE_URI', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
function admin_dashboard() {
    return '/admin';
}
function admin_category() {
    return '/admin/categories';
}
function admin_category_add() {
    return '/admin/categories/add';
}
function admin_category_edit($id) {
    return '/admin/categories/edit/' . $id;
}
function admin_product() {
    return '/admin/products';
}
function admin_product_add() {
    return '/admin/products/add';
}
function admin_product_edit($id) {
    return '/admin/products/edit/' . $id;
}
function admin_product_ajaxUpdate() {
    return '/admin/products/quickUpdate';
}
function admin_product_delete() {
    return '/admin/products/delete';
}