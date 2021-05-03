<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require('../../config/database.php');
require('../../model/quotes_db.php');

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

// Instantiate quote object
$quote = new Quote($db);

// Get ID from URL
$quote->id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// Get quote
$quote->read_single();

// Create array
$quote_array = array(
    'id' => $quote->id,
    'quote' => $quote->quote,
    'authorid' => $quote->authorId,
    'author' => $quote->author,
    'categoryid' => $quote->categoryId,
    'category' => $quote->category
);

//Convert to JSON 
print_r(json_encode($quote_array));