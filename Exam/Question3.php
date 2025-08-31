<?php

$output = null;

function resultCheck($gradeRange){
    switch ($gradeRange) {
        case "A+":
            return "You Got A+ (Outstanding)";
        case "A":
            return "You Got A (Very Good)";
        case "B":
            return "You Got B (Good)";
        case "C":
            return "You Got C (Poor)";
        case "Fail":
            return "You have (Failed)";
        default:
            return "Please select a valid option.";
    }
}

if(isset($_POST["submit"])){
    $selectedRange = $_POST["mark"];   // value from dropdown
    $output = resultCheck($selectedRange);
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
        h1{
            font-size: 2rem;
            text-decoration: underline;
        }
        select, input[type=submit]{
            display: block;
            margin: 1rem auto;
            padding: 12px;
            border-radius: 1rem;
            width: 60%;
            font-size: 1rem;
        }
        input[type=submit]{
            background: #200434;
            color: #fff;
            width: 40%;
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
    <form action="Question3.php" method="post">
        <label for="mark">Select Your Mark Range:</label>
        <select name="mark" id="mark" required>
            <option value="">-- Select --</option>
            <option value="A+">A+</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="Fail">Fail</option>
        </select>
        <input type="submit" value="Check Result" name="submit">
    </form>

    <?php if($output): ?>
        <h3 class="output"><?= $output ?></h3>
    <?php endif; ?>
</div>
</body>
</html>
