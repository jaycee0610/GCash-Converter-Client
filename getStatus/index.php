<?php

include_once "../server-config.php";

//Transaction ID Sent By Server [Result from createCharges]
$id = "your_transaction_id";

$url = $gateway_server."/request-receiver/EWallet-Status/";

$data = [
    "api_key" => $api_key,
    "id" => $id,
];

$jsonData = json_encode($data);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
$response = curl_exec($ch);


$httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Get the HTTP status code

echo $response;

curl_close($ch);
?>