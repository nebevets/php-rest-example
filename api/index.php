<?php
// header("Access-Control-Allow-Origin: *");

// /api/blog/2

// /index.php?type=blog&id=2


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

// echo $method;
// print_r($_SERVER);
// exit();

switch($method){
    case 'GET':
        if($id){
            $file_name = 'read-one.php';
        } else {
            $file_name = 'read-list.php';
        }
        
        break;
    case 'POST':
        $file_name = 'create.php';
        break;
    case 'PATCH':
        $_PATCH = json_decode(file_get_contents('php://input'), true);
        $file_name = 'update.php';
        break;
    case 'DELETE':
        if($id){
            $file_name = 'remove.php';
            break;
        }
    default:
        $output['error'] = 'unknown request method';
}

$file_path = "$type/$file_name";

if(file_exists($file_path)){
    require_once($file_path);
} else {
    $output['method'] = $method;
    $output['error'] = 'Unknown request type';
}

print json_encode($output);
