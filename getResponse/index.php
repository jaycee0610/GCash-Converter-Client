<?php

$payload = file_get_contents('php://input');
$data = json_decode($payload, true);
// Check if the decoding was successful

if ($data === null) {
    // Handle the error; the JSON data is not valid
    http_response_code(400); // Bad request
    echo "Invalid JSON";
    exit;
} else {

    // Sample Payload Data
    $id = $data['id'];
    http_response_code(200); // OK
    echo "Payload Received";

    // Log the payload for debugging (optional)
    file_put_contents('webhook.log', print_r($data, true));
}

?>