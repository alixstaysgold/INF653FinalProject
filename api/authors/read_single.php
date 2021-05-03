<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require('../../config/database.php');
require('../../model/authors_db.php');

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

// Instantiate quote object
$author = new Author($db);

// Get ID from URL
$author->id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// Get quote
$author->read_single();

// Create array
$author_arr = array(
    'id' => $author->id,
    'author' => $author->author
);

//Convert to JSON 
print_r(json_encode($author_arr));