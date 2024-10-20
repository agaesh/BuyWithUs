<?php include("./ProductController.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            {
                $data = [
                    'product_name' => $_POST['product_name'],
                    'product_description' => $_POST['product_description'],
                    'quantity' => $_POST['quantity'],
                    'unit_price' => $_POST['unit_price'],
                    'remark' => $_POST['remark']
                ];
                $productController = new ProductController();
                $insert = $productController->addProduct($data);
            }
                
        }
    ?>
    <form method = "POST">
        <input type="text" name="product_name" placeholder="Enter Product Name">
        <input type="text" name = "product_description" placeholder = "Enter Product Descrption">
        <input type="text" name = "quantity" placeholder = "Quantity">
        <input type="text" name = "unit_price" placeholder = "Price">
        <textarea name="remark" name = "submit" id="">
        </textarea>
        <input type="submit" value="Add Product">
    </form>
</body>
</html>