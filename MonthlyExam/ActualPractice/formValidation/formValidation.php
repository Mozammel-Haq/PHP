<?php
$name = $email = $password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!preg_match("/^[a-zA-Z .]{3,}$/", $name)) {
        $errors['name'] = "Name is Not Valid";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email is not Valid";
    }
    if (strlen($password) < 5) {
        $errors['password'] = "Password must be at least 6 characters";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Validation</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
        }

        .form-box {
            width: 350px;
            margin: 120px auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #109092ff;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
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
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="form-box">
        <h2>Form Validation</h2>
        <form method="post">
            <label>Name:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
            <span class="error"><?= $errors['name'] ?? '' ?></span>

            <label>Email:</label>
            <input type="text" name="email" value="<?= htmlspecialchars($email) ?>">
            <span class="error"><?= $errors['email'] ?? '' ?></span>

            <label>Password:</label>
            <input type="password" name="password">
            <span class="error"><?= $errors['password'] ?? '' ?></span>

            <button type="submit">Submit</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)): ?>
            <p style="color:green;">Form Submitted Successfully</p>
        <?php endif; ?>
    </div>
</body>

</html>