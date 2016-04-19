<?php

//admin router
$route['admin'] = 'admin/DashboardController';
//category page
$route['admin/categories'] = 'admin/CategoriesController';
$route['admin/categories/add']['get'] = 'admin/CategoriesController/add';
$route['admin/categories/add']['post'] = 'admin/CategoriesController/postAdd';
$route['admin/categories/edit/(:num)']['get'] = 'admin/CategoriesController/edit/$1';
$route['admin/categories/edit/(:num)']['post'] = 'admin/CategoriesController/postEdit/$1';
$route['admin/categories/delete']['post'] = 'admin/CategoriesController/delete';
$route['admin/categories/quickUpdate']['post'] = 'admin/CategoriesController/ajaxUpdate';
//product page
$route['admin/products'] = 'admin/ProductController';
$route['admin/products/edit/(:num)']['get'] = 'admin/ProductController/edit/$1';
$route['admin/products/edit/(:num)']['post'] = 'admin/ProductController/postEdit/$1';
$route['admin/products/add']['get'] = 'admin/ProductController/add';
$route['admin/products/add']['post'] = 'admin/ProductController/postAdd';
$route['admin/products/delete']['post'] = 'admin/ProductController/ajaxDelete';
$route['admin/products/quickUpdate']['post'] = 'admin/ProductController/ajaxUpdate';