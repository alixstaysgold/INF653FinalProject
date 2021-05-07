<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require('../../config/database.php');
require('../../model/authors_db.php');

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

// Instantiate Author object
$author = new Author($db);

// query
$result = $author->read();
// get row count
$num = $result->rowCount();

// Check if authors
if ($num > 0) {
    // Author array
    $authors_arr = array();
    

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $author_item = array(
            'id' => $id,
            'author' => $author
        );
        // Push to "data"
        array_push($authors_arr,$author_item);
    }
    
    // Convert to JSON & output
    echo json_encode($authors_arr);
} else {
    // No authors
    echo json_encode(
        array('message' => 'No authors Found')
    );
}