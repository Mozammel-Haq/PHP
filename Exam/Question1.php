<?php
$num1 =null;
$num2 =null;
$num3 =null;
$result= null;
 function largest($num1,$num2,$num3){
        if($num1>$num2 && $num1>$num3) {
            return "($num1)  is the Largest Number among ($num1, $num2, $num3)";
        }else if($num2>$num1 && $num2>$num3) {
            return "($num2)  is the Largest Number among ($num1, $num2, $num3)";
        }else{
            return "($num3)  is the Largest Number among( $num1, $num2, $num3)";
        }
    }
    if (isset($_POST["submit"])) {
    $num1 = (int)$_POST["num1"];
    $num2 = (int)$_POST["num2"];
    $num3 = (int)$_POST["num3"];

    $result = largest($num1, $num2, $num3);
    }
?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>Maximum Number Calculator</title>
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
            width: 550px;
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
            gap: 0.75rem;
            margin-top: 1rem;
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
    <h1>Maximum Number Calculator</h1>
    <form action="#" method="post">
        <label for="num1">Enter the Number:</label>
        <input type="text" name="num1" id="num1">

        <label for="num2">Enter the Number:</label>
        <input type="text" name="num2" id="num2">

        <label for="num3">Enter the Number:</label>
        <input type="text" name="num3" id="num3">
        <input type="submit" value="Result" name="submit">
    </form>

    <?php if ($result !== null): ?>
        <h3 class="output"> <?= $result ?></h3>
    <?php endif; ?>
</div>


</body>
</html>

