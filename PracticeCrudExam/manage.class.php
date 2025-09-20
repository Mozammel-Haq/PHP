<?php
    include_once 'db_config.php';
class Customer {
    public $id, $name,$email,$phone;

    public function __construct($id, $name, $email, $phone){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }
    public static function getAllOrders(){
        global $conn;
        $sql = $conn->prepare("SELECT * FROM oreder_details");
        $sql->execute();
        $result = $sql->fetchAll();
        return $result;
    }
    public static function getCustomers(){
        global $conn;
        $sql = $conn->prepare("SELECT * FROM customers");
        $sql->execute();
        $result = $sql->fetchAll();
        return $result;
    }
    public static function deleteCustomer($id){
        global $conn;
        $sql = $conn->prepare("DELETE FROM customers WHERE id = $id");
        $sql->execute();
        if($sql){
            return true;
        }
    }
}

