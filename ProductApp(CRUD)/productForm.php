 <?php
    require_once("product.class.php");

    // Add Product

    if (isset($_POST["submitBtn"])) {

        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $offPrice = $_POST["offPrice"];

        $product = new Product($id, $name, $price, $offPrice);
        $save = $product->save();

        if ($save) {
            header("Location: productApp.php");
            unset($_POST["id"]);
            unset($_POST["name"]);
            unset($_POST["price"]);
            unset($_POST["offPrice"]);
        }
    }

    // Delete Product

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        Product::delete($id);
        header("Location: productApp.php");
        exit;
    }

    // Update Function
    if (isset($_POST["updateBtn"])) {

        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $offPrice = $_POST["offPrice"];

        $product = new Product($id, $name, $price, $offPrice);
        $update = $product->update();

        if ($update) {
            header("Location: productApp.php");
            unset($_POST["id"]);
            unset($_POST["name"]);
            unset($_POST["price"]);
            unset($_POST["offPrice"]);
        }
    }

    // Find product
    $findProduct = null;
    if (isset($_GET["searchID"])) {
        $id = $_GET["searchID"];
        $findProduct = Product::find($id);
    }

//    LogOut
 if(isset($_GET["logout"])){
     $logout = $_GET["logout"];
     if($logout){
         session_unset();
         session_destroy();
         header("location:Login/login.php");
     }

 }

 ?>


 <?php

    if (is_null($findProduct)) {

    ?>




         <form action="" method="post">
             <div class="intro"> <h2>Add New Product</h2> <a href="../ProductApp(CRUD)/productApp.php?logout=1" class="logout"> LogOut</a></div>

             <label for="id">Product ID:</label>
             <input type="text" name="id" id="id">

             <label for="name">Product Name:</label>
             <input type="text" name="name" id="name">

             <label for="price">Product Price:</label>
             <input type="text" name="price" id="price">

             <label for="offPrice">Product Offer Price:</label>
             <input type="text" name="offPrice" id="offPrice">

             <input type="submit" value="Add" name="submitBtn">

         </form>
 <?php
    } else {

    ?>
     <div class="container">
         <form action="" method="post">
             <div class="intro"> <h2>Edit the Product</h2> <a href="" class="logout"> LogOut</a></div>
             <label for="id">Product ID:</label>
             <input type="text" name="id" id="id" value="<?php echo $findProduct["id"] ?? '' ?>">

             <label for="name">Product Name:</label>
             <input type="text" name="name" id="name" value="<?php echo $findProduct["name"] ?? ''; ?>">

             <label for="price">Product Price:</label>
             <input type="text" name="price" id="price" value="<?php echo $findProduct["price"] ?? ''; ?>">

             <label for="offPrice">Product Offer Price:</label>
             <input type="text" name="offPrice" id="offPrice" value="<?php echo $findProduct["offPrice"] ?? ''; ?>">

             <input type="submit" value="Update" name="updateBtn">

         </form>
     </div>

 <?php
    }
    ?>