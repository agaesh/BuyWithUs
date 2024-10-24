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
                    'remark' => $_POST['remark'],
                    'image'=>$_FILES['image']['name']
                ];
                $productController = new ProductController();
                $insert = $productController->addProduct($data);
                if($insert === true){
                    $uploadImage = $productController->UploadImage($_FILES['image']);
                }
            }
                
        }
    ?>
    <form method = "POST">
        <input type="text" name="product_name" placeholder="Enter Product Name">
        <input type="text" name = "product_description" placeholder = "Enter Product Descrption">
        <input type="text" name = "quantity" placeholder = "Quantity">
        <input type="text" name = "unit_price" placeholder = "Price">
        
        <select name="measurement" id="measurement">
            <option value="kg">Kilogram (KG)</option>
            <option value="g">Gram (G)</option>
            <option value="lb">Pound (LB)</option>
            <option value="oz">Ounce (OZ)</option>
            <option value="litre">Litre (L)</option>
            <option value="ml">Millilitre (ML)</option>
        </select>

        <input type ="hidden" name = "company_code" placeholder = "company_code">
        <textarea name="remark" name = "submit" id="">
        </textarea>
        <input type="submit" value="Add Product">
    </form>
</body>
</html>