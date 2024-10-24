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
            $productCode = $this->GenerateProductCode($data['product_name']);
            $stmt = $this->conn->prepare($sql);
            $lastID = $stmt->insert_id;
            
            if (!$stmt->execute()) {
                throw new Exception("Failed to execute statement: " . $stmt->error);
            }
  
            $productCode = $this->GenerateProductCode($data['product_name']);
            $sql = "UPDATE products SET product_code = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            
            // Bind the parameters to the statement
            $stmt->bind_param('si', $productCode, $lastID);
            return $stmt->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            throw $ex; // Ensure it rethrows the exception after logging
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
     
             $fullpath = __DIR__ . '/' . $directory . '/' . $target;
             if(move_uploaded_file($tmpFilePath,$fullpath)){
                 echo "File uploaded successfully to: " . $fullpath;
             }
        }
    }catch(Exception $x){
           echo "Error" . $x->getMessage();
    }
    }
   }

?>