<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


require('../../config/database.php');
require('../../model/categories_db.php');

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

// Instantiate quote object
$category = new Category($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

if (!empty($category->id)){
$category->id = $data->id;}

// Create Post
if ($category->delete()) {
    echo json_encode(
        array('message' => 'Category deleted')
    );
} else {
    echo json_encode(
        array('message' => 'Category not deleted')
    );
}