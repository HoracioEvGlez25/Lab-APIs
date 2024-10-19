<?php
require_once 'prestashop-api.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $customerId = $_GET['id'];
        $response = $prestashopApi->get('customers/' . $customerId);
    } else {
        $response = $prestashopApi->get('customers');
    }
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newCustomer = [
        'customer' => [
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'passwd' => $_POST['passwd'],
            'active' => $_POST['active']
        ]
    ];
    
    $response = $prestashopApi->post('customers', $newCustomer);
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $customerId = $_PUT['id'];
    
    $updatedCustomer = [
        'customer' => [
            'firstname' => $_PUT['firstname'],
            'lastname' => $_PUT['lastname'],
            'email' => $_PUT['email'],
            'active' => $_PUT['active']
        ]
    ];
    
    $response = $prestashopApi->put('customers', $customerId, $updatedCustomer);
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $customerId = $_DELETE['id'];
    
    $response = $prestashopApi->delete('customers', $customerId);
    echo json_encode($response);
}
?>
