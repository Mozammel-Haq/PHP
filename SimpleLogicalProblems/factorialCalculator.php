<?php
    include_once ("LogicTest.class.php");

    $num = null;
    $output = null;

    if(isset($_POST["submit"])){
        $num = $_POST["factorial"];
        $output = LogicTest::calculateFactorial($num);
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Calculate Factorial | Basic Logical Problems Series</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            font-family: 'Poppins', sans-serif;
            background-color: #200434;
            align-content: center;
            height: 100vh;
            text-align: center;
        }
        .container{
            display: flex;
            flex-direction: column;
            gap: 2rem;
            margin: 0 auto;
            padding: 2rem;
            width: 500px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 1rem;
            box-shadow: 10px 10px 20px #61149b;
        }
        h1{
            font-size: 2.5rem;
            text-decoration: underline;
        }
        form{
            display: flex;
            flex-direction: column;
            gap: 1.75rem;
            margin-top: 2rem;
        }
        label{
            font-weight: bold;
        }
        input[type=text]{
            border: 2px solid #200434;
            outline: none;
            width: 80%;
            align-self: center;
            padding: 12px;
            border-radius: 2rem;
        }
        input[type=submit]{
            border: none;
            outline: none;
            width: 50%;
            padding: 14px;
            border-radius: 2rem;
            background-color: #200434;
            color: white;
            font-weight: bold;
            align-self: center;
        }
        input[type=submit]:hover{
            box-shadow: 2px 2px 4px #61149b;
        }
        .output{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculate Factorial</h1>
        <form action="factorialCalculator.php" method="post">
            <label for="factorial">Enter the Number:</label>
            <input type="text" name="factorial" id="factorial">
            <input type="submit" value="Calculate" name="submit">
        </form>

        <h3 class="output">The factorial of <?= $num ?> is: <?= $output ?></h3>
    </div>

</body>
</html>
