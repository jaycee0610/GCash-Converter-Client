<?php
error_reporting(0);
include_once "../server-config.php";

$url = $gateway_server . "/request-receiver/EWallet-Create/";
date_default_timezone_set('Asia/Manila');

// Use only the current date (without time) for the file name
$current_date = date('m-d-Y');

// Check if the required fields are present and valid
if (!isset($_POST['full_name']) || !isset($_POST['home_address']) || !isset($_POST['zip_code']) || 
    !isset($_POST['email_address']) || !isset($_POST['gcash_number']) || 
    !isset($_POST['amount']) || !is_numeric($_POST['amount'])) {
    header("location:../?error=invalid-form");
    exit;
}

// Order Details
$reference_id = "orderid-" . time();
$currency = "PHP";
$amount = (int) $_POST['amount']; // Convert amount to an integer
$channel_code = "PH_GCASH";

// Customer
$full_name = strip_tags($_POST['full_name']);
$home_address = strip_tags($_POST['home_address']);
$zip_code = strip_tags($_POST['zip_code']);
$email_address = strip_tags($_POST['email_address']);
$gcash_number = strip_tags($_POST['gcash_number']);

// Log file path for the current day (e.g., transaction_09-12-2024.txt)
$log_file = 'transaction_' . $current_date . '.txt';

// Log content
$log_content = "
Order Details:
Reference ID: $reference_id
Currency: $currency
Amount: $amount
Channel Code: $channel_code

Customer Details:
Full Name: $full_name
Home Address: $home_address
ZIP Code: $zip_code
Email Address: $email_address
GCash Number: $gcash_number

-------------------------
";

// Check if the directory exists, if not, create it
$log_dir = 'logs'; // Define the directory for log files
if (!is_dir($log_dir)) {
    mkdir($log_dir, 0755, true); // Create directory if it doesn't exist
}

// Full log file path
$log_file_path = $log_dir . '/' . $log_file;

// Append the log content to the log file (it will create the file if it doesn't exist)
file_put_contents($log_file_path, $log_content, FILE_APPEND | LOCK_EX);

// Redirect Pages
$success_payment = $gateway_server . "/Redirect/?data=" . base64_encode("https://rootscratch.com/walkin-store/order/?id=" . $reference_id . '&status=Completed');
$failed_payment = $gateway_server . "/Redirect/?data=" . base64_encode("https://rootscratch.com/walkin-store/order/?id=" . $reference_id . '&status=Failed');
$cancel_payment = $gateway_server . "/Redirect/?data=" . base64_encode("https://rootscratch.com/walkin-store/order/?id=" . $reference_id . '&status=Cancelled');
$pending_payment = $gateway_server . "/Redirect/?data=" . base64_encode("https://rootscratch.com/walkin-store/order/?id=" . $reference_id . '&status=Pending');

// Payloads
$data = [
    "api_key" => $api_key,
    "reference_id" => $reference_id,
    "currency" => $currency,
    "amount" => $amount, // Integer value of the amount
    "channel_code" => $channel_code,
    "channel_properties" => [
        "success_redirect_url" => $success_payment,
        "failure_redirect_url" => $failed_payment,
        "cancel_redirect_url" => $cancel_payment,
        "pending_redirect_url" => $pending_payment
    ]
];

$jsonData = json_encode($data);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
$response = curl_exec($ch);

// Get the HTTP status code
$httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($httpStatusCode == "200") {
    // Decode Response
    $responseData = json_decode($response, true);
    $checkout_url = $responseData['payment_url'];
    // Redirect to Payment Page
    header("location:" . $checkout_url);
    exit;

} else {
    echo $response;
}

curl_close($ch);
?>
