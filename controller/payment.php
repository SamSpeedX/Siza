<?php 
require "config.php";

class payment 
{
  public static function pay($name, $email, $number, $kiasi)
  {
    // URL of the API endpoint
$url = "https://api.zeno.africa";

// Data to send for creating the order 
$orderData = [
    'create_order' => 1,
    'buyer_email' => $email,
    'buyer_name' => $name,
    'buyer_phone' => $number,
    'amount' => $kiasi, #AMOUNT_TO_BE_PAID
    'account_id' => ACCOUNT_ID, 
    'api_key' => API_KEY, 
    'secret_key' => SECRET KEY,
    'webhook_url' => 'https://example.com/webhook'
];

// Build the query string from the data array
$queryString = http_build_query($orderData);

// Create a context for the HTTP request
$options = [
    'http' => [
        'method'  => 'POST',
        'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
        'content' => $queryString,
    ],
];
$context = stream_context_create($options);

// Perform the POST request
$response = file_get_contents($url, false, $context);

// Check if the request was successful
if ($response === FALSE) {
    logError("Error: Unable to connect to the API endpoint.");
}

// Output the response
return $response;

// Function to log errors
function logError($message)
{
    // Function to log errors
    file_put_contents('error_log.txt', $message . "\n", FILE_APPEND);
}
  }

  public static function status($order_id)
  {
    // The endpoint URL where the request will be sent
$endpointUrl = "https://api.zeno.africa/order-status";

// Data to be sent in the POST request
$postData = [
    'check_status' => 1,
    'order_id' => $order_id,
    'api_key' => API_KEY,
    'secret_key' => SECRET KEY
];

// Initialize cURL
$ch = curl_init($endpointUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
curl_setopt($ch, CURLOPT_POST, true); // Send as POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData)); // Add POST fields

// Execute the request and get the response
$response = curl_exec($ch);


// Check for cURL errors

if (curl_errno($ch)) {
    return [
        "status" => "error",
        "message" => 'cURL error: ' . curl_error($ch)
    ];
} else {
    // Decode the JSON response
    $responseData = json_decode($response, true);

    // Format the response to match the desired structure
    if ($responseData['status'] === 'success') {
        return [
            "status" => "success",
            "order_id" => $responseData['order_id'],
            "message" => $responseData['message'],
            "payment_status" => $responseData['payment_status']
        ];
    } else {
        return [
            "status" => "error",
            "message" => $responseData['message']
        ];
    }
}

// Close cURL session
curl_close($ch);
  }
}
