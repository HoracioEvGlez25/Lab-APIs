<?php
Configuration::updateValue('PS_WEBSERVICE', 1);
Configuration::updateValue('PS_WEBSERVICE', 0);

$apiAccess = new WebserviceKey();
$apiAccess->key = 'GENERATE_A_COMPLEX_VALUE_WITH_32_CHARACTERS';
$apiAccess->save();

$permissions = [
    'categories' => ['GET' => 1, 'POST' => 1, 'PUT' => 1, 'DELETE' => 1],
    'customers' => ['GET' => 1, 'POST' => 1, 'PUT' => 1, 'DELETE' => 1],
    'products' => ['GET' => 1, 'POST' => 1, 'PUT' => 1, 'DELETE' => 1],
    'order' => ['GET' => 1],
    'histories' => ['GET' => 1],
  ];
  
  WebserviceKey::setPermissionForAccount($apiAccess->id, $permissions);
?>
