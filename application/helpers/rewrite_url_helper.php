<?php
namespace REWRITE_URL;
defined('BASEPATH') OR exit('No direct script access allowed');
defined('PUBLICPATH') OR exit('No direct script access allowed');
define('BASE_URI', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

function admin_category() {
    return '/admin/categories';
}
function admin_category_edit($id) {
    return '/admin/categories/edit/' . $id;
}
function admin_product() {
    return '/admin/products';
}
function admin_product_edit($id) {
    return '/admin/products/edit/' . $id;
}