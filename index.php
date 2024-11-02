<?php require("./user/UserController.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'montserrat',sans-serif;
            padding:0;
            margin:0;
            box-sizing: border-box;
        }
        .header nav a{
            text-decoration: none;
            color:white;
            margin : 0 5px;

        }
        input,select{
            padding:10px;
            border:1px solid #ccc;
            outline:none;
            width:300px;
            margin:10px;
            border-radius:4px;
        }
        .header{
            width:100%;
        }
        .header nav{
            display:flex;
            flex-direction:Row;
            background-color: red;
            align-items: center;
            height:30px;
            padding:30px;
            background-color: #111184;
            color:yellow;
        }
        .header nav .logo h2{
            font-size: 19px;
        }
        .header nav .menu-link {
            display:inline-flex;
            margin-left: auto;
            min-width: 100px;
        }
        .header nav li{
            list-style: none;
        }
        .container{
            display:flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        form{
            display:flex;
            flex-direction: column;
        }
        input[type = "submit"]{
            border:none;
            outline:none;
            font-weight: bolder;
            background-color: gray;
        }
<body>
    <?php
      if(isset($_REQUEST['REQUEST_METHOD'])){
        $userController = new UserController();
      }
    ?>
    <div class="header">
        <nav>
            <div class="logo">
                <h2>BuyWithUs</h2>
            </div>

            <div class="menu-link">
                <li><a href="">Login</a></li>
                <li><a href="">Register</a></li>
            </div>
        </nav>
    </div>

    <div class="container">
        <div style = "padding:10px;">
            <h2>Register Seller Account</h2>
            <a href="" style = "margin:12px; padding:12px;">Use Mobile Number To Register</a>
        </div>
        <form method = "POST">
            <input type="email" name="" id="" placeholder="Enter Your Email">
            <input type="password" placeholder = "Enter Your Password">
            <input type="confirmpass" placeholder = "Confirm Your Password">

            <select name="" id="">
                <option value="value">
                    Invidividual
                </option>

                <option value="business">
                    Business
                </option>
            </select>
            <a href="" style = "color:black; text-decoration:underline; text-align:Center;">Forgot Password?</a>
            <input type="submit" value = "Register">
        </form>
    </div>
</body>
</html>