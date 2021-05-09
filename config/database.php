<?php
class Database{
    private  $host = 'localhost';
    private  $db_name = "quotesdb";
    private  $username = 'root';
    private  $password = '';
    private  $conn;
    

  


    public function connect() {
        $this->conn = null;
  
        try { 
          $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
          echo 'Connection Error: ' . $e->getMessage();
        }
  
        return $this->conn;
      }
    }

    /* class Database{
      private  $host = 'y5svr1t2r5xudqeq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
      private  $db_name = "exzjt19ap2vi79c7";
      private  $username = 'hoh9jdjgevre8syx';
      private  $password = 'a0vqev7qd6maf412';
      private  $conn;
      
    
    
  
  //heroku
      public function connect() {
          $this->conn = null;
    
          try { 
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
          }
    
          return $this->conn;
        }
      }


 */
    