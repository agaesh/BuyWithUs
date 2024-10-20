<?php
    require("../database.php");
    require("../produtModel.php");

   class ProductController extends Database{
    private $db = null;
    private $productModel = null;

    public function __contruct(){
       $this->db = new Database();
       $this->productModel = new ProductModel();
    }

    public function addProduct($data){
        $insert = $this->productModel->add($data);
    }
   }

?>