<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


require('../../config/database.php');
require('../../model/authors_db.php');

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

// Instantiate quote object
$author = new Author($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

if (!empty($data->author) && !empty($data->id)){
$author->id = $data->id;
$author->author = $data->author;
    if ($author->update()) {
    echo json_encode(
        array('message' => 'Author updated')
    );
}

// update Post

} else {
    echo json_encode(
        array('message' => 'Author not updated')
    );
}