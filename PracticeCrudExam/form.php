<?php
    include_once 'db_config.php';
    include_once 'manage.class.php';

//    print_r($customers);


    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        global $conn;
        $sql = $conn->query("call insert_customer('$name','$email','$phone')");

    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $delete = Customer::deleteCustomer($id);
    }

$orders = Customer::getAllOrders();
$customers = Customer::getCustomers();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Order Management</title>
    <style>
        h1{
            text-align: center;
        }
        .container{
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        table,tr,th,td{
            text-align: center;
            border-collapse: collapse;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <h1>Customer Order Management</h1><br><br>

    <div class="container">
        <table>
            <tr>
                <th>Customer Name</th>
                <th>Action</th>
            </tr>
            <?php
            $html ="";
            foreach($customers as $customer){
                $html .= "<tr>
                    <td>$customer[name]</td>
                    <td><a href='form.php?id=$customer[id]'>Delete</a></td>
                </tr>";
            }
            echo $html;
            ?>
        </table>
        <table>
            <tr>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Order Date</th>
                <th>Order Amount</th>
            </tr>

            <?php
            $html = '';
            foreach ($orders as $order){
                $html .= "<tr>
                                <td>$order[name]</td>
                                <td>$order[email]</td>
                                <td>$order[phone]</td>
                                <td>$order[order_date]</td>
                                <td>$order[amount]</td>
                            </tr>";
            }
            echo $html;
            ?>
        </table>
        <form action="form.php" method="post">

            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name"><br><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email"><br><br>
            <label for="phone">Phone:</label><br>
            <input type="text" name="phone" id="phone"><br><br>
            <input type="submit" value="Add Customer" name="submit">
        </form>






    </div>

</body>
</html>
