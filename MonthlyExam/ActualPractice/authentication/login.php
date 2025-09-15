<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $isValid = false;

    // read file directly into array (each line is an element)
    $file = file("users.txt", FILE_IGNORE_NEW_LINES);

    foreach ($file as $line) {
        list($fileUser, $filePass) = explode(",", $line);
        if ($fileUser === $username && $filePass === $password) {
            $_SESSION['user'] = $username;
            $isValid = true;
            break;
        }
    }

    if ($isValid) {
        header("Location: welcome.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
        }

        .login-box {
            width: 300px;
            margin: 150px auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #109092ff;
            border-radius: 8px;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 50%;
            padding: 10px;
            background: #109092ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        </form>
    </div>
</body>

</html>