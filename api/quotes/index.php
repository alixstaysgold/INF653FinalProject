  
<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//require DB and models
require('../../config/database.php');
require('../../model/quotes_db.php');
require('../../model/authors_db.php');
require('../../model/categories_db.php');

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

// Instantiate quote object
$quote = new Quote($db);

// Instantiate category object
$category = new Category($db);

// Instantiate Author object
$author = new Author($db);

// GET parameters in URL
$authorId = filter_input(INPUT_GET, 'authorId', FILTER_VALIDATE_INT);
$categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_VALIDATE_INT);
$limit = filter_input(INPUT_GET,'limit',FILTER_VALIDATE_INT);

//read quotes by author and category
if ($authorId && $categoryId) {
    $quote->authorId = $authorId;
    $quote->categoryId = $categoryId;

    // Quotes query
    $result = $quote->read_by_cat_auth();

    // Get row count
    $num = $result->rowCount();
    
    // Check if any quotes
    if ($num > 0) {
        // Quote array
        $quotes_arr = array();
        
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
    
            $quote_item = array(
                'id' => $id,
                'quote' => html_entity_decode($quote),
                'authorId' => $authorId,
                'author' => $author,
                'categoryId' => $categoryId,
                'category' => $category
            );
            // Push to "data"
            array_push($quotes_arr,$quote_item);
        }
        
        // Convert to JSON & output
        echo json_encode($quotes_arr);
    } 
    
    else {
        // No posts
        echo json_encode(
            array('message' => 'No Quotes Found')
        );
}
}
// read quotes by authorid
else if ($authorId){ 
$quote->authorId = $authorId;

// query
$result = $quote->read_by_author();

// Get row count
$num = $result->rowCount();

// Check if any quotes
if ($num > 0) {
    // Quote array
    $quotes_arr = array();
    $quotes_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $quote_item = array(
            'id' => $id,
            'quote' => html_entity_decode($quote),
            'authorId' => $authorId,
            'author' => $author,
            'categoryId' => $categoryId,
            'category' => $category
        );
        // Push to "data"
        array_push($quotes_arr['data'],$quote_item);
    }
    
    // Convert to JSON & output
    echo json_encode($quotes_arr);
} 

else {
    // No posts
    echo json_encode(
        array('message' => 'No Quotes Found')
    );
}}

// Get quotes by category id
else if ($categoryId){ 
    $quote->categoryId = $categoryId; 
    // Quotes query
    $result = $quote->read_by_category();
    // Get row count
    $num = $result->rowCount();
    
    // Check if any quotes
    if ($num > 0) {
        // Quote array
        $quotes_arr = array();
        $quotes_arr['data'] = array();
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
    
            $quote_item = array(
                'id' => $id,
                'quote' => html_entity_decode($quote),
                'authorId' => $authorId,
                'author' => $author,
                'categoryId' => $categoryId,
                'category' => $category
            );
            // Push to "data"
            array_push($quotes_arr['data'],$quote_item);
        }
        
        // Convert to JSON & output
        echo json_encode($quotes_arr);
    } 
    
    else {
        // No posts
        echo json_encode(
            array('message' => 'No Quotes Found')
        );
    }} 

    // Get limited number of quotes
else if ($limit) {
$quote->limit = $limit; 
// Quotes query
$result = $quote->read_limit();
// Get row count
$num = $result->rowCount();
    
    // Check if any quotes
    if ($num > 0) {
        // Quote array
        $quotes_arr = array();
        $quotes_arr['data'] = array();
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
    
            $quote_item = array(
                'id' => $id,
                'quote' => html_entity_decode($quote),
                'authorId' => $authorId,
                'author' => $author,
                'categoryId' => $categoryId,
                'category' => $category
            );
            // Push to "data"
            array_push($quotes_arr['data'],$quote_item);
        }
        
        // Convert to JSON & output
        echo json_encode($quotes_arr);
    } else {
        // No posts
        echo json_encode(
            array('message' => 'No Quotes Found')
        );
    }}

    else {

// Quotes query
$result = $quote->read();
// Get row count
$num = $result->rowCount();

// Check if any quotes
if ($num > 0) {
    // Quote array
    $quotes_arr = array();
    $quotes_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $quote_item = array(
            'id' => $id,
            'quote' => html_entity_decode($quote),
            'authorId' => $authorId,
            'author' => $author,
            'categoryId' => $categoryId,
            'category' => $category
        );
    
        // Push to "data"
        array_push($quotes_arr['data'],$quote_item);
    }
    
    // Convert to JSON & output
    echo json_encode($quotes_arr);
} 

else {
    // No posts
    echo json_encode(
        array('message' => 'No Quotes Found')
    );
}
    }