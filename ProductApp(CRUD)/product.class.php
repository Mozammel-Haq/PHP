<?php

class Product {

    public $id, $name, $price, $offPrice ;

    public function __construct($id, $name, $price, $offPrice){
        $this -> id = $id;
        $this -> name = $name;
        $this -> price = $price;
        $this -> offPrice = $offPrice;

    }


    public function save(){

        $product = $this->id . "," . $this->name . "," . $this->price . "," . $this->offPrice;

        if(filesize("products.txt")>0){
            $product = PHP_EOL. $product;
        }

        file_put_contents("products.txt", $product, FILE_APPEND);
    }

    public static function showProductTable(){
        $products = file("products.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $html = "<table>";

        $html .= "<tr><th>Product ID</th><th>Product Name</th><th>Product Price</th><th>Offer Price</th><th>Actions</th></tr>";

        foreach ($products as $row) {
            list($id, $name, $price, $offPrice) = explode(",", $row);

            $html .= "<tr><td>{$id}</td><td>{$name}</td><td>{$price}</td><td>{$offPrice}</td><td><a href='index.php?searchID={$id}'><button>Edit</button><a><a href='index.php?id={$id}'><button>Delete</button><a></td></tr>";
        }
        $html .= "</table>";

        return $html;
    }

    public static function delete($productID){
        $products = file("products.txt");
        $product = "";

        foreach ($products as $singleProduct) {
            list($id) = explode(",",$singleProduct);

            if($id != $productID){
                $product .= $singleProduct;
            }
        }

        file_put_contents("products.txt",$product);
        return true;
    }

    public function update(){
        $products = file("products.txt");
        $product = "";

        foreach ($products as $singleProduct) {

            list($id) = explode(",", $singleProduct);
            if ($id == $this->id) {
                $product .= $this->id . "," . $this->name . "," . $this->price . "," . $this->offPrice;
            }else{
                $product .= $singleProduct;
            }
         }

        file_put_contents("products.txt", $product);
        return true;
    }

    public static function find($productID){
        $products = file("products.txt");
        $product =[];

        foreach ($products as $singleProduct) {

            list($id, $name, $price, $offPrice) = explode(",", $singleProduct);

            if ($id == $productID) {
                $product = ["id"=>$id,"name"=>$name,"price"=>$price,"offPrice"=>$offPrice];
                break;
            }
       
    }

        return $product;
   }

}


// 

// $newProduct = new Product(3, "pro 2", 10, 8);


// $newProduct->save();

// Product::delete(3);

// echo Product::showProductTable();

//   print_r(Product::find(5));