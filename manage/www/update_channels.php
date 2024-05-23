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

    //add new id name pairs first
    if ($data['add']['id'] != "" && $data['add']['name'] != "") {
        $add_id = $data['add']['id'];
        $add_name = $data['add']['name'];
        $db->exec("INSERT INTO channels (id, name) VALUES ('$add_id', '$add_name');");
    }

    //update entries
    foreach ($data['update'] as $update_pair) {
        $upid = $update_pair['id'];
        $upnm = $update_pair['name'];
        $db->exec("UPDATE channels SET name = '$upnm' WHERE id LIKE '$upid';");
    }

    //delete entries
    foreach ($data['delete'] as $key) {
        $db->exec("DELETE FROM channels WHERE id LIKE '$key';");
    }
?>