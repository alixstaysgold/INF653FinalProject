<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


require('../../config/database.php');
require('../../model/categories_db.php');

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

// Instantiate quote object
$category = new Category($db);

// Get raw posted data
$data = !empty((file_get_contents("php://input"))) ? json_decode(file_get_contents("php://input")) : die();

$category->id = $data->id;
$category->category = $data->category;

// Create Post
if ($category->update()) {
    echo json_encode(
        array('message' => 'Category updated')
    );
} else {
    echo json_encode(
        array('message' => 'Category not updated')
    );
}