<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product App</title>
</head>

<body>
    <?php
    require_once("productForm.php");
    ?>
    <br><br>
    <?php
    echo Product::showProductTable();
    ?>
</body>

</html>