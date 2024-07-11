<?php
        // URL of the API you are calling
        $apiUrl = "https://money.rediff.com/money1/currentstatus.php?companycode=15130012";

        // Initialize cURL session
        $curl = curl_init($apiUrl);

        // Set cURL options
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Return the response as a string
        curl_setopt($curl, CURLOPT_HTTPGET, true);         // Use GET request

        // Execute cURL request and get the response
        $response = curl_exec($curl);

        // Check for cURL errors
    if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            echo json_encode(array("error" => $error_msg));
        } else {
            // Set the appropriate content-type for the response
            header('Content-Type: application/json');
            echo $response;  // Output the response
        }

        // Close the cURL session
        curl_close($curl);
    ?>