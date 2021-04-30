<?php 

    class Quote {
        //DB
        private $conn;
        private $table = 'quotes';

        //Properties
        public $id;
        public $authorId;
        public $categoryId;
        public $quote;
        public $author;
        public $category;
    

        //Constructor with database
        public function __construct($db){
        $this->conn = $db;
    }
    
        //read quotes
        public function read(){
            //query
            $query = 'SELECT q.quote, q.id, q.categoryId, q.authorId, 
                    c.category, a.author
                    FROM quotes q 
                    INNER JOIN categories c
                    ON q.categoryId = c.id
                    INNER JOIN authors a
                    ON q.authorId = a.id
                    ORDER BY q.id';

            //prepare
            $stmt = $this->conn->prepare($query);

            //execute

            $stmt->execute();

            return $stmt;
        }

            public function read_single(){
                $query = 'SELECT q.quote, q.id, q.categoryId, q.authorId, 
                    c.category, a.author
                    FROM quotes q 
                    INNER JOIN categories c
                    ON q.categoryId = c.categoryId
                    INNER JOIN authors a
                    ON q.authorId = a.authorId
                    WHERE q.id = ?
                    LIMIT 0,1';

                //prepare
                $stmt = $this->conn->prepare($query);

                //bind param

                $stmt->bindParam(1, $this->id);

                //execute

                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                //set properties
                $this->id = $row['id'];
                $this->quote = $row['quote'];
                $this->category = $row['category'];
                $this->author = $row['author'];
            }

            public function create_quote(){
                //query
                $query = 'INSERT INTO ' . $this->table . '
                        SET
                            quote = :quote,
                            authorId= :authorId,
                            categoryId= :categoryId';
                
                //prepare
                $stmt = $this->conn->prepare($query);

                //clean
                $this->quote = htmlspecialchars(strip_tags($this->quote));
                $this->authorId = htmlspecialchars(strip_tags($this->authorID));
                $this->categoryId = htmlspecialchars(strip_tags($this->categoryId));

                //bind

                $stmt->bindParam(':quote', $this->quote);
                $stmt->bindParam(':authorId', $this->authorId);
                $stmt->bindParam(':categoryId', $this->categoryId);

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
                        quote = :quote,
                        authorId= :authorId,
                        categoryId= :categoryId

                    WHERE
                        id=id';
                
                //prepare
                $stmt=$this->conn->prepare($query);

                //clean
                $this->quote = htmlspecialchars(strip_tags($this->quote));
                $this->authorId = htmlspecialchars(strip_tags($this->authorID));
                $this->categoryId = htmlspecialchars(strip_tags($this->categoryId));
                $this->id = htmlspecialchars(strip_tags($this->id));

                //bind
                $stmt->bindParam(':quote', $this->quote);
                $stmt->bindParam(':authorId', $this->authorId);
                $stmt->bindParam(':categoryId', $this->categoryId);
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
                $query = 'DLETE FROM ' . $this->table . ' 
                        WHERE id = :id';
                
                //prepare
                $stmt = $this->conn->prepare($query);

                //clean
                $this->id = htmlspecialchars(strip_tags($this->id));

                //bind
                $stmt = bindParam(':id', $this->id);

                //execute
                if($stmt->execute()){
                    return true;
                }

                printf("Error: %s.\n" , $stmt->error);
            
    
            }
            
           
    }