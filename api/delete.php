<?php

require("../product/ProductController.php");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if(isset($_GET['id'])){
        $productController = new ProductController();
        $delete = $productController->DeleteProduct($_GET['id']);
        if($delete){
            echo json_encode(array("message"=>"Product has been deleted Successfully"));
        }

    }else{
        http_response_code(400);
        echo json_encode(array("message"=>"Something problem"));
    }
} else {
    http_response_code(405);
    echo json_encode(array("message" => "Invalid request method. Only DELETE is allowed."));
}
