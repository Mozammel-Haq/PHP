<?php
include_once 'customers.class.php';

//ADD New Customer
    if(isset($_POST['addCustomer'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];

        $customers = new Customers($name, $email, $address,$mobile,"");
        $addCustomer = $customers->addCustomer();

        if($addCustomer){
            header('location:customerHome.php');
            unset($_POST['name']);
            unset($_POST['email']);
            unset($_POST['address']);
            unset($_POST['mobile']);
        }

    }
//Delete a Customer
    if(isset($_GET['deleteID'])){
        $deleteID = $_GET['deleteID'];
        Customers::deleteCustomer($deleteID);
    }
//   Get a Customer Details
$getCustomer = null;
if(isset($_GET['getID'])){
    $getID = $_GET['getID'];
    $getCustomer = Customers::getCustomerById($getID);
}

//Update a Customer Details
if(isset($_POST['updateCustomer'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $customers = new Customers($name, $email, $address, $mobile,$id);
    $updateCustomer = $customers->updateCustomer();
    if($updateCustomer){
        header('location:customerHome.php');
        unset($_POST['id']);
        unset($_POST['name']);
        unset($_POST['email']);
        unset($_POST['address']);
        unset($_POST['mobile']);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers Page</title>
</head>
<body>
    <div class="form-container">
        <?php
        if(is_null($getCustomer)){
        ?>
        <form method="POST" action="customerHome.php">
            <label for="name">Customer Name</label> <br>
            <input type="text" id="name" name="name" placeholder="Customer Name"><br><br>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" placeholder="Email"><br><br>
            <label for="address">Address</label><br>
            <input type="text" id="address" name="address" placeholder="Address"><br><br>
            <label for="mobile">Mobile</label><br>
            <input type="number" id="mobile" name="mobile" placeholder="Mobile"><br><br>
            <input type="submit" value="Add Customer" name="addCustomer"><br>
        </form><br><br>

        <?php }else{?>
        <form method="POST" action="customerHome.php">
            <input type="hidden" name="id" value="<?php echo $getCustomer['id']; ?>">
            <label for="name">Customer Name</label> <br>
            <input type="text" id="name" name="name" placeholder="Customer Name" value="<?php echo $getCustomer['name']?>"><br><br>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $getCustomer['email']?>"><br><br>
            <label for="address">Address</label><br>
            <input type="text" id="address" name="address" placeholder="Address" value="<?php echo $getCustomer['address']?>"><br><br>
            <label for="mobile">Mobile</label><br>
            <input type="number" id="mobile" name="mobile" placeholder="Mobile" value="<?php echo $getCustomer['mobile']?>"><br><br>

            <input type="submit" value="Update Customer" name="updateCustomer"><br>
        </form><br><br>
        <?php } ?>
    </div>
    <div class="table-container">
        <?php echo Customers::getAllCustomers()?>
    </div>
</body>
</html>
