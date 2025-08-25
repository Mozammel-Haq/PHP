<?php session_start(); if(!$_SESSION["name"] ){
    header("location:Login/login.php");
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product App</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>Welcome back <?php echo $_SESSION["name"]  ??  "User" ; ?> !!!</h1>
    <div class="container">

        <?php
        require_once("productForm.php");
        ?>
        <?php echo Product::showProductTable(); ?>

    </div>


</body>

</html>