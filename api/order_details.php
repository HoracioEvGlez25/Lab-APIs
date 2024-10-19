<?php
require_once 'prestashop-api.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $response = $prestashopApi->get('order_details');
    echo json_encode($response);
}
?>
