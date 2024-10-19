<?php
require_once 'prestashop-api.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $response = $prestashopApi->get('categories');
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newCategory = $_POST;
    $response = $prestashopApi->post('categories', $newCategory);
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $categoryId = $_PUT['id'];
    $updatedData = $_PUT;
    $response = $prestashopApi->put('categories', $categoryId, $updatedData);
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $categoryId = $_DELETE['id'];
    $response = $prestashopApi->delete('categories', $categoryId);
    echo json_encode($response);
}
?>
