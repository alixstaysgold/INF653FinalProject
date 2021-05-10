<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require('../../config/database.php');
require('../../model/categories_db.php');

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

// Instantiate quote object
$category = new Category($db);

// Get ID from URL
$category->id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// Get quote
$category->read_single();

// Create array
$cat_arr = array(
    'id' => $category->id,
    'category' => $category->category
);

//Convert to JSON 
print_r(json_encode($cat_arr));