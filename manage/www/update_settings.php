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

//add new key value pairs first
if ($data['add']['key'] != "" && $data['add']['value'] != "") {
    $add_key = $data['add']['key'];
    $add_value = $data['add']['value'];
    $db->exec("INSERT INTO settings (key, value) VALUES ('$add_key', '$add_value');");
}

//update entries
foreach ($data['update'] as $update_pair) {
    $upk = $update_pair['key'];
    $upv = $update_pair['value'];
    $db->exec("UPDATE settings SET value = '$upv' WHERE key LIKE '$upk';");
}

//remove entries
foreach ($data['delete'] as $key) {
    $db->exec("DELETE FROM settings WHERE key LIKE '$key';");
}


?>