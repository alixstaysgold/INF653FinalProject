<?php
require ('config/database.php');
require ('model/quotes_db.php');
require ('model/authors_db.php');
require ('model/categories_db.php');

// Connect to Database
$database = new Database();
$db = $database->connect();

// Instantiate each model
$author = new Author($db);
$category = new Category($db);
$quote = new Quote($db);

//no clue if this is right 

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if(!$action)
{
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if(!$action)
    {
        $action = 'default';
    }
}

$categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_VALIDATE_INT);

$authorId = filter_input(INPUT_GET, 'authorId', FILTER_VALIDATE_INT);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);




// Get Request Quote Data 
if ($authorId) { $quote->authorId = $authorId; }
if ($categoryId) { $quote->categoryId = $categoryId; }




// Read Data
$authors = $author->read();
$categories = $category->read();
$quotes = $quote->read();


if($authorId && $categoryId)
        {
            $quotes = $quote->read_by_cat_auth($authorId, $categoryId);
            $authors = $author->read();
            $categories = $category->read();
            include('view/quotes_list.php');
            
        }
        else if($authorId)
        {
            $quotes = $quote->read_by_author($authorId);
            $authors = $author->read();
            $categories = $category->read();
            include('view/quotes_list.php');
            
        }
        else if($categoryId)
        {
            $quotes = $quote->read_by_category($categoryId);
            $authors = $author->read();
            $categories = $category->read();
            include('view/quotes_list.php');
            
        }
        else
        {
        
            include('view/quotes_list.php');
        }          

