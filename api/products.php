<?php
require_once 'prestashop-api.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];
        $response = $prestashopApi->get('products/' . $productId);
    } else {
        $response = $prestashopApi->get('products');
    }
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newProduct = $_POST;
    $response = $prestashopApi->post('products', $newProduct);
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    if (isset($_PUT['id'])) {
        $productId = $_PUT['id'];
        $updatedData = $_PUT;
        $response = $prestashopApi->put('products', $productId, $updatedData);
        echo json_encode($response);
    } else {
        echo json_encode(['error' => 'ID del producto no proporcionado']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    if (isset($_DELETE['id'])) {
        $productId = $_DELETE['id'];
        $response = $prestashopApi->delete('products', $productId);
        echo json_encode($response);
    } else {
        echo json_encode(['error' => 'ID del producto no proporcionado']);
    }
}
?>
