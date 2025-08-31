<?php

interface ILogicTest
{
    public static function calculateFactorial($num);
    public static function isPrime($num);
    public static function resultCheck($num);
}

class LogicTest implements ILogicTest
{
    public static function calculateFactorial($num){
        $factorial = 1;
        for($i = 1; $i <= $num; $i++){
            $factorial = $factorial * $i ;
        }
        return $factorial;
    }

    public static function isPrime($num){
        if($num < 2){
            return false;
        }
        for($i = 2; $i < $num; $i++){
            if($num % $i == 0){
                return false;
            }
        }
        return true;
    }

    public static function resultCheck($num){
        if($num >= 80 && $num <= 100){
            return "Congratulations! you got A+";
        }else if($num >= 70 && $num < 80){
            return "Congratulations! you got A";
        }else if($num >= 60 && $num < 70){
            return "Congratulations! you got B";
        }else if($num >= 50 && $num < 60){
            return "Congratulations! you got C";
        }else if($num < 50 && $num >= 0){
            return "Sorry, You have Failed";
        }else{
            return "Enter a Valid Mark";
        }
    }
}
?>
