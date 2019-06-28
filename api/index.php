<?php

$output = [
    'success' => false
];

$method = $_SERVER['REQUEST_METHOD'];
$type = $_GET['type'];

$file_name = '';
$id = null;

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

switch($method){
    case 'GET':
        if($id){
            $file_name = 'read-one.php';
        } else {
            $file_name = 'read-list.php';
        }
        
        break;
    case 'POST':
        if(empty($_POST)){
            $_POST = json_decode(file_get_contents('php://input'), true);
        }
        $file_name = 'create.php';
        break;
    case 'PATCH':
        if($id){
            $_PATCH = json_decode(file_get_contents('php://input'), true);
            $file_name = 'update.php';
        } else {
            $output['error'] = 'Missing ID, unable to update';
        }
        
        break;
    case 'DELETE':
        if($id){
            $file_name = 'remove.php';
        } else {
            $output['error'] = 'Missing ID, unable to delete';
        }
        break;
    default:
        $output['error'] = 'unknown request method';
}

$file_path = "$type/$file_name";

if(empty($output['error']) && file_exists($file_path)){
    require_once($file_path);
} else {
    $output['method'] = $method;
    $output['message'] = 'Unknown request type';
}

print json_encode($output);
