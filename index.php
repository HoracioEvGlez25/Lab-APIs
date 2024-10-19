<?php
header("Content-Type: application/json");
include 'config.php';

$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = explode('/', trim($_SERVER['PATH_INFO'], '/'));

switch ($request_uri[0]) {
    case 'customers':
        include 'api/customers.php';
        break;
    case 'category':
        include 'api/category.php';
        break;
    case 'products':
        include 'api/products.php';
        break;
    case 'order_histories':
        include 'api/order_histories.php';
        break;
    case 'order_details':
        include 'api/order_details.php';
        break;
    default:
        echo json_encode(["message" => "Resource not found."]);
        break;
}
?>


