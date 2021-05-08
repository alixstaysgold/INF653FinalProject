<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require('../../config/database.php');
require('../../model/categories_db.php');

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

// Instantiate Author object
$category = new Category($db);

// query
$result = $category->read();
// get row count
$num = $result->rowCount();

// Check if authors
if ($num > 0) {
    // Author array
    $cats_arr = array();
    

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $cat_item = array(
            'id' => $id,
            'category' => $category
        );
        // Push to "data"
        array_push($cats_arr,$cat_item);
    }
    
    // Convert to JSON & output
    echo json_encode($cats_arr);
} else {
    // No authors
    echo json_encode(
        array('message' => 'No Categories Found')
    );
}