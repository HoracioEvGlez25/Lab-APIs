<?php
require_once 'prestashop-api.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $orderHistoryId = isset($_GET['id']) ? $_GET['id'] : null;
    
    if ($orderHistoryId) {
        $response = $prestashopApi->get('order_histories/' . $orderHistoryId);
    } else {
        $response = $prestashopApi->get('order_histories');
    }

    echo json_encode($response);
}
?>
