<?php require("./user/UserController.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./resources/css/index.css">
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

    <div class="form-container">
        <form method = "POST">
        <h2>Register Seller Account Here</h2>
        <a href = "#" class = "mobileLink" style = "margin:12px; padding:0px; text-align:center;">Use Mobile Number To Register</a>
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

            <p style = "text-align:center;">Or</p>
            <div class="social-media-buttn">
                <button class = "social-button facebook-button">Facebook</button>
                <button class = "social-button google-button">Google</button>
            </div>
            <br>
        </form>
        <div class = "hero">
           <img
            src="./image/human.jpeg"
            class="img-fluid rounded-top"
            alt=""
           />
           <p>Any individual or business can be a seller on BuyWithUs. You can sell</p>
           <ul>
            <li>Item</li>
            <li>Item</li>
           </ul>
        </div>
    </div>
</body>
<script>
    let mobileLogin= document.querySelector(".mobileLink");
    mobileLogin.addEventListener("click",(e)=>{
     e.preventDefault();
     let panels = document.querySelectorAll(".panel");
     let panel = panels[0];
     let panel2 =panels[1];
    panel.style.display = "none";
    let mobileInput = document.createElement("input");

    let role = document.querySelector("#role");

    // Set the type attribute to "tel" for a mobile number
    mobileInput.setAttribute("type", "tel");

    // Optionally set other attributes
    mobileInput.setAttribute("placeholder", "Enter your mobile number");
    mobileInput.setAttribute("id", "mobile-input");
    mobileInput.setAttribute("class", "mobile-input");
    role.style.display = "none";

    panel2.appendChild(mobileInput);
    panel2.style.display = "flex";
    panel2.style.flexDirection = "column";
})
</script>
</html>