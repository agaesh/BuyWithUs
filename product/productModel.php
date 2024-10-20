<?php 
  
  class ProductModel extends Database{
    public function addItem($data):bool{
        $columns = implode(", ", array_keys($data));
        $values = implode("', '", array_values($data));
        $sql = "INSERT INTO products ($columns) VALUES ('$values')";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }
  }

?>