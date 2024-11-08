<?php
    require("../database.php");
    require("./productModel.php");

   class ProductController extends Database{
    private $db = null;
    private $productModel = null;
    public $uploadedImagePath = null;
    public $lastRecordID = null;
    public function __contruct(){
       $this->db = new Database();
       $this->productModel = new ProductModel();
    }

    public function addProduct($data){
        try {
            $columns = implode(", ", array_keys($data));
            $values = implode("', '", array_values($data));
            $sql = "INSERT INTO products ($columns) VALUES ('$values')";
            $stmt = $this->conn->prepare($sql);
            if (!$stmt->execute()) {
                throw new Exception("Failed to execute statement: " . $stmt->error);
            };
            $this->lastRecordID= $stmt->insert_id;
  
            $productCode = $this->GenerateProductCode($data['product_name']);
            $sql = "UPDATE products SET product_code = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            
            $updateProductCode = $this->conn->prepare($sql)->bind_param("si",$productCode, $lastID);
            return $updateProductCode;
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            throw $ex; // Ensure it rethrows the exception after logging
        }
    }
    public function UpdateProduct($value, $field, $id){
        try{
            
          $sql = "UPDATE products SET  $field = ? WHERE id = ?";
          $stmt= $this->conn->prepare($sql);
          $stmt->bind_param("si", $value, $id);
          return $stmt->execute();
        }catch(Exception $ex){
            throw new Exception("Error:". $ex->getMessage());
        }
    }
    private function GenerateProductCode($productName){
        $uniqueId = time();
        $productCode = strtoupper((substr($productName, 0,4))) . $uniqueId;
        return $productCode;
    }
    public function UploadImage($filePath){
        try{
           
            $image = $filePath;
            $target = $filePath['name'];
            $directory = "../upload";
            
            if(isset($image) && $image['error'] == UPLOAD_ERR_OK){
             $tmpFilePath= $image['tmp_name'];
     
            if(!is_dir($directory)){
                mkdir(__DIR__ . '/' . $directory, 0755, true);
            }
     
            $fullpath = $directory. '/' .$target;
             if(move_uploaded_file($tmpFilePath,$fullpath)){
                 echo "File uploaded successfully to: " . $fullpath;
                $this->uploadedImagePath = $fullpath;
                return true;
             }
        }
    }catch(Exception $x){
           echo "Error" . $x->getMessage();
    }
    }
   }

?>