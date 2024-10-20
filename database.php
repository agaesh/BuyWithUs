<?php
  class Database{
    private $host = 'localhost';
    private $db = 'commerce';
    private $user = 'root';
    private $pass = '';
    private $conn;


    public function __construct(){
         $this->ConnectToDatabase();
    }
    public function ConnectToDatabase(){
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        
        if($this->conn === true){
            echo "Database Connected Succefully";
        }
    }
  }

?>