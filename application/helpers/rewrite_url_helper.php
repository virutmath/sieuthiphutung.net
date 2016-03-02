<?php
defined('BASEPATH') OR exit('No direct script access allowed');
defined('PUBLICPATH') OR exit('No direct script access allowed');
define('BASE_URI', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

function admin_category() {
    return '/admin/categories';
}
function admin_category_edit($id) {
    return '/admin/categories/edit/' . $id;
}