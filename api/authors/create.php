<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


require('../../config/database.php');
require('../../model/authors_db.php');

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

// Instantiate quote object
$author = new Author($db);

// get data
$data = json_decode(file_get_contents("php://input"));

if(!empty($author->author)){
$author->author = $data->author;}

// create
if ($author->create()) {
    echo json_encode(
        array('message' => 'Author created')
    );
} else {
    echo json_encode(
        array('message' => 'Author not created')
    );
}