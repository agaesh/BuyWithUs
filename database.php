<?php
  class Database{
    private $host = 'localhost';
    private $db = 'commerce';
    private $user = 'root';
    private $pass = '';
    public $conn;


    public function __construct(){
         $this->conn = $this->ConnectToDatabase();
    }
    public function ConnectToDatabase(){
        $conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        
        if($this->conn === true){
            echo "Database Connected Succefully";
        }
       return $conn;
    }
  }

?>