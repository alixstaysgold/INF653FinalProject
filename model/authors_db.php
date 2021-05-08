<?php

class Author {
    //db
    private $conn;
    private $table = 'authors';

    //category properties
    public $author;
    public $id;

    //constructor
    public function __construct($db){
        $this->conn=$db;
    }

    //read cat
    public function read(){
        //query
        $query = 'SELECT author, id
                FROM authors
                ORDER BY id';

        //prep
        $stmt = $this->conn->prepare($query);

        //execute
        $stmt->execute();
        
        return $stmt;
    }

    public function read_single(){
        // Create query
        $query = 'SELECT
              id,
              author
            FROM
              ' . $this->table . '
          WHERE id = ?
          LIMIT 0,1';
    
          //Prepare statement
          $stmt = $this->conn->prepare($query);
    
          // Bind ID
          $stmt->bindParam(1, $this->id);
    
          // Execute query
          $stmt->execute();
    
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
          // set properties
          $this->id = $row['id'];
          $this->author = $row['author'];
      }

    public function create(){
        //query
        $query = 'INSERT INTO ' . $this->table . '
                SET
                    author = :author';
        
        //prepare
        $stmt = $this->conn->prepare($query);

        //clean
        $this->author = htmlspecialchars(strip_tags($this->author));
    

        //bind

        $stmt->bindParam(':author', $this->author);
        

        //execute

        if($stmt->execute()){
            return true;
        }

        //print error

        printf("Error: %s./n", $stmt->error);
        return false;
    }

    public function update(){
        //query
        $query= 'UPDATE ' . $this->table . '
            SET
                author = :author

            WHERE
                id = :id';
        
        //prepare
        $stmt=$this->conn->prepare($query);

        //clean
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->id = htmlspecialchars(strip_tags($this->id));

        //bind
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':id', $this->id);

        //execute
        if($stmt->execute()){
            return true;
        }

        //print error
        printf("Error:%s.\n", $stmt->error);  
        return false;      
    }

    public function delete(){
        //query
        $query = 'DELETE FROM ' . $this->table . ' 
                WHERE id = :id';
        
        //prepare
        $stmt = $this->conn->prepare($query);

        //clean
        $this->id = htmlspecialchars(strip_tags($this->id));

        //bind
        $stmt->bindParam(':id', $this->id);

        //execute
        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n" , $stmt->error);
    

    }

}

