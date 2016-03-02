<?php
ob_clean();
header('Access-Control-Allow-Origin: *');

$action = $_POST['action'];
$data = json_encode($_POST['data']);
$response = ['success'=>0];
switch($action) {
    case 'save_cat' :
        if(file_put_contents('categories.txt',$data)) {
            $response['success'] = 1;
            $response['data'] = $data;
            echo json_encode($response);die();
        }else{
            $response['error'] = 'Can\'t save data';
            echo json_encode($response);die();
        }
        break;
}