<?php

    session_start();

    $savedName = "Mozammel";
    $savedPass = "123";
    if(isset($_POST["submit"])){
        $name = $_POST["username"];
        $pass = $_POST["password"];
        $message = "";

        if($name == $savedName && $pass == $savedPass){
            $message = "Welcome $name!";
            $_SESSION["name"] = $name;
            header("location:../productApp.php");
        }else{
            $message = "Wrong username or password!";
//            header("location:login.php");
        }

    }

    if(isset($_GET["logout"])){
        $logout = $_GET["logout"];
        if($logout){
            session_unset();
            session_destroy();
            header("location:login.php");
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
    <style>
        body{
            margin: 0;
            padding: 0;
            place-content: center;
            height: 100vh;
        }
        h1{text-align: center}
        .container{
            width: 400px;
            margin: 0 auto;
        }
        form{
            width: 100%;
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        input{
            padding: 14px;
            border-radius: 10px;
        }
        input[type=submit]{
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border: none;
        }
        label{
            font-weight: bold;
        }
    </style>
    <title>Login page</title>
</head>
<body>

    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="post">

            <label for="username">User Name:</label>
            <input type="text" name="username" placeholder="Username">

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login" name="submit">

            <?php if(!empty($message)) echo "<p style='color:red;text-align:center;'>$message</p>"; ?>
        </form>
    </div>

</body>
</html>