<?php
/* class Database{
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
    } */

  class Database
{
    
    public function connect()
    {
        $url = getenv('JAWSDB_URL');
        $dbparts = parse_url($url);
        $hostname = $dbparts['host'];
        $username = $dbparts['user'];
        $password = $dbparts['pass'];
        $database = ltrim($dbparts['path'],'/');
        $dsn = "mysql:host={$hostname};dbname={$database}";
        try
        {
            $this->conn = new PDO($dsn, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo 'Connection Failed: ' . $e->getMessage();
        }
        return $this->conn;
    }
}

