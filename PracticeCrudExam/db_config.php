<?PHP
const SERVER = "localhost";
const USER = "root";
const PASS = "";
const DB = "isdbpractice";


try {
    $conn= new PDO("mysql:host=".SERVER.";dbname=".DB,USER,PASS,[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
}catch (PDOException $e){
    echo $e->getMessage();
}