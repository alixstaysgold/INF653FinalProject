<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


require('../../config/database.php');
require('../../model/quotes_db.php');

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

// Instantiate quote object
$quote = new Quote($db);

// Get raw posted data
$data = !empty((file_get_contents("php://input"))) ? json_decode(file_get_contents("php://input")) : die();

$quote->id = $data->id;

// Create Post
if ($quote->delete()) {
    echo json_encode(
        array('message' => 'Quote deleted')
    );
} else {
    echo json_encode(
        array('message' => 'Quote not deleted')
    );
}