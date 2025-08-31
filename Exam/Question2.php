<?php

class Student
{
    private $id, $name, $batch;

    public function __construct($id, $name, $batch)
    {
        $this->id = $id;
        $this->name = $name;
        $this->batch = $batch;
    }

    // return string instead of echo
    public function result() {
        $students = file("students.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($students as $oneStudent) {
            list($studentId, $studentResult) = explode(",", $oneStudent);
            if ($studentId == $this->id) {
                return "{$this->name} got {$studentResult}";
            }
        }
        return "Result not found for ID $this->id.";
    }
}

$output = "";

// Handle form submission
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $id = $_POST["id"];
    $batch = $_POST["batch"];

    $student = new Student($id, $name, $batch);
    $output = $student->result();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Result | Basic Logical Problems Series</title>
    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background-color: #200434;
            text-align: center;
        }
        .container{
            margin: 2rem auto;
            padding: 2rem;
            width: 500px;
            background: #fff;
            border-radius: 1rem;
            box-shadow: 10px 10px 20px #61149b;
        }
        input[type=text], input[type=submit]{
            display: block;
            margin: 1rem auto;
            padding: 10px;
            border-radius: 1rem;
            width: 80%;
        }
        input[type=submit]{
            background: #200434;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }
        .output{
            margin-top: 1rem;
            color: red;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Check Your Result Now</h1>
    <form method="post">
        <label>Enter Your Name:</label>
        <input type="text" name="name">
        <label>Enter Your ID:</label>
        <input type="text" name="id">
        <label>Enter Your Batch:</label>
        <input type="text" name="batch" >
        <input type="submit" value="Check Result" name="submit">
    </form>

    <?php if($output): ?>
        <h3 class="output"><?= $output ?></h3>
    <?php endif; ?>
</div>
</body>
</html>
