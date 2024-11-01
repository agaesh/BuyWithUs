<?php include("./ProductController.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
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
                    'measurement'=>$_POST['measurement']
                ];
                $productController = new ProductController();
                $insert = $productController->addProduct($data);
                if($insert === true){
                    if($productController->UploadImage($_FILES['image'])){
                        echo "Product Added Successfully";
                        $updateProduct = $productController->UpdateProduct($productController->uploadedImagePath, "image", $productController->lastRecordID);
                        echo $updateProduct;
                    }
                }
            }     
        }
    ?>
    <div class="container">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row mb-3">
                <input type="file" name="image" accept=".jpeg, .jpg, .png" class="form-control w-100">
            </div>
            <div class="row mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" placeholder="Enter Product Name" class="form-control w-100">
            </div>
            <div class="row mb-3">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" placeholder="Enter Product Description" class="form-control w-100">
            </div>
            <div class="row mb-3 d-flex align-items-center">
                <div class="col">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" name="quantity" placeholder="Quantity" class="form-control w-100">
                </div>
                <div class="col">
                    <label for="unit_price" class="form-label">Unit Price</label>
                    <input type="text" name="unit_price" placeholder="Price" class="form-control w-100">
                </div>
                <div class="col">
                    <label for="measurement" class="form-label">Measurement</label>
                    <select name="measurement" id="measurement" class="form-control w-100">
                        <option value="kg">Kilogram (KG)</option>
                        <option value="g">Gram (G)</option>
                        <option value="lb">Pound (LB)</option>
                        <option value="oz">Ounce (OZ)</option>
                        <option value="litre">Litre (L)</option>
                        <option value="ml">Millilitre (ML)</option>
                    </select>
                </div>
            </div>
        </div>
        <input type="hidden" name="company_code">
        <div class="row mb-3">
            <label for="remark" class="form-label">Remark</label>
            <textarea name="remark" class="form-control w-100"></textarea>
        </div>
        
        <div class="d-flex ">
            <input type="submit" value="Add Product" class="btn btn-primary m-1">
            <input type="reset" value="Clear" class="btn btn-secondary m-1">
        </form>
</div>
<div class="container">
    <table id = "table">
    <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Product Measurement</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
$(document).ready(function() {
    var companyID = 100; // Replace with the actual company ID variable or value
    try {
        $('#table').DataTable({
            "ajax": {
                "url": "http://localhost/BuyWithUs/api/show.php",
                "method": "GET",
                "dataSrc": "",
            },
            "columns": [
                { "data": "id" },
                { "data": "product_name" },
                { "data": "product_description"},
                { "data":"measurement"},
                {
                "data": null,
                "render": function(data, type, row) {
                    var editBtn = '<button class="btn btn-warning" data-id="' + row.id + '">Edit</button>';
                    var deleteBtn = '<button class="btn btn-danger" data-id="' + row.id + '">Delete</button>';
                    return editBtn + ' ' + deleteBtn;
                }
                }
]
        });
        // Use event delegation to attach the click event to dynamically created buttons
        $('#table tbody').on('click', '.btn-danger', async function() {
           var dataId = $(this).attr('data-id');
           let message = confirm(`Are you sure you want to delete the record with ID ${dataId}?`);

            if (message) {                       
                $.ajax({
                    url: "http://localhost/BuyWithUs/api/delete.php?id=" +dataId,
                    method: "DELETE",

                    success: function(response) {
                        console.log(response.message);
                        // Optionally, you can refresh the table to reflect the changes
                        $('#table').DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log("Error deleting record: " + error);
                    }
                });
            } else {
                // Deletion canceled
                alert("Deletion canceled.");
            }
        });

    } catch (error) {
        console.log(error);
    }
});
</script>
</html>