<html>
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

print_r($data['add']['key'] . ":" . $data['add']['value'] . "\n");

    
    //print_r($_POST['add'] . "\n");
    //print_r($_POST['delete'] . "\n");
    //print_r($_POST['update'] . "\n");
    //print_r(gettype($_POST['update']) . "\n");
/*
$db = new SQLite3('data/yt-notify.db');

$key = $_POST['key'];
$value = $_POST['value'];

$db->exec("UPDATE settings SET value = '$value' WHERE key = '$key';");
*/

?>
</html>