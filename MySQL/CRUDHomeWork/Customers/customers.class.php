<?php
include_once("db_config.php");

interface iCustomers
{
    public static function getAllCustomers();

    public function addCustomer();
    public static function deleteCustomer($deleteID);
    public function updateCustomer();

    public static function getCustomerById($getID);
}

class Customers implements iCustomers{
    public $id,$name, $email, $address,$mobile;

    public function __construct($name, $email, $address, $mobile,$id=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->mobile = $mobile;
    }
    public static function getAllCustomers(){
        global $connect;
        $data = $connect->query("SELECT * FROM customers");
        $html = "<table border='1' cellpadding='0' cellspacing='0'>";
        $html .= "<tr><th>ID</th><th>Name</th><th>Email</th><th>Address</th><th>Mobile</th><th>Actions</th></tr>";
        while($row = $data->fetch_object()){
            $html .= "<tr><td>$row->id</td><td>$row->name</td><td>$row->email</td><td>$row->address</td><td>$row->mobile</td><td><a href='customerHome.php?getID=$row->id'>Edit</a><a href='customerHome.php?deleteID=$row->id'>Delete</a></td>";
        }
        $html .= "</table>";
        return $html;
    }
    public function addCustomer(){
        global $connect;
        $add= $connect->query("INSERT INTO customers(name, email, address, mobile) VALUES('$this->name','$this->email','$this->address','$this->mobile')");
        if($add){
            return true;
        }
    }
    public static function deleteCustomer($deleteID){
        global $connect;
        $delete= $connect->query("DELETE FROM customers WHERE id=$deleteID");
        if($delete){
            return true;
        }
    }
    public function updateCustomer(){
        global $connect;
        $data = $connect->query("update customers set name='$this->name', email='$this->email',address='$this->address',mobile='$this->mobile' where id=$this->id");
    }
    public static function getCustomerById($getID){
        global $connect;
        $get= $connect->query("SELECT * FROM customers WHERE id=$getID");
        $customer = $get->fetch_assoc();
        if($customer){
            return $customer;
        }
        return "Customer not found";

    }
}

//echo Customers::getAllCustomers();
//
//$newCustomer = new Customers("Harun","harun@gmail.com","Vola","0134783433","");
//echo $newCustomer->addCustomer();
