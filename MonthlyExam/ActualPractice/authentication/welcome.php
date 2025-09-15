<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <style>
        body {
            font-family: sans-serif;
            background: #e0f7fa;
            text-align: center;
            padding: 50px;
            font-size: 18px;
        }

        h1 {
            color: #004c13ff;
        }

        a {
            display: block;
            text-decoration: none;
            padding: 10px 30px;
            background-color: #016019ff;
            color: white;
            width: 100px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <h1>Welcome, <?php echo $_SESSION['user']; ?></h1>
    <a href="login.php">Logout</a>
</body>

</html>