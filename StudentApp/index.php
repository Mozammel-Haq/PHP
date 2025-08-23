<?php

require_once ("student.class.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student App</title>
</head>
<body>
    <h1>Student Management System</h1>
    <?php echo Student::studentTable(); ?>
    <?php require("studentForm.php")?>

</body>
</html>