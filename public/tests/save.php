<?php
ob_clean();
header('Access-Control-Allow-Origin: *');

//save product to file
$products = $_POST['products'];
file_put_contents('products.txt',json_encode($products));