
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
                    'description' => $_POST['description'],
                    'quantity' => $_POST['quantity'],
                    'price' => $_POST['price'],
                    'remark' => $_POST['remark']
                ];
                
            }
                
        }
    ?>
    <form method = "POST">
        <input type="text" name="product_name" placeholder="Enter Product Name">
        <input type="text" name = "description" placeholder = "Enter Product Descrption">
        <input type="text" name = "quantity" placeholder = "Quantity">
        <input type="text" name = "price" placeholder = "Price">
        <textarea name="remark" name = "submit" id="">
        </textarea>
        <input type="submit" value="Add Product">
    </form>
</body>
</html>