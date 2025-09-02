<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student App Crud</title>
</head>

<body>
    <?php
    include_once "studentForm.php";

    echo "<br><br><br>";

    echo Student::showStudent();
    ?>

</body>

</html>