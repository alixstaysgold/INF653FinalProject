<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


require('../../config/database.php');
require('../../models/authors_db.php');

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

// Instantiate quote object
$author = new Author($db);

// Get raw posted data
$data = !empty((file_get_contents("php://input"))) ? json_decode(file_get_contents("php://input")) : die();

$author->id = $data->id;
$author->author = $data->author;

// Create Post
if ($author->update()) {
    echo json_encode(
        array('message' => 'Author updated')
    );
} else {
    echo json_encode(
        array('message' => 'Author not updated')
    );
}