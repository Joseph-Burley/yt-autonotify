<?php
    // Read the JSON string from the request body
    $jsonString = file_get_contents('php://input');

    // Decode the JSON string into a PHP associative array
    $data = json_decode($jsonString, true); // true for associative array

    // Check if decoding was successful
    if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(400); // Bad Request
        exit('Invalid JSON data');
    }

    $db = new SQLite3('data/yt-notify.db');
    
    //remove entries
    foreach ($data['delete'] as $key) {
        $db->exec("DELETE FROM videos WHERE id LIKE '$key';");
    }
?>