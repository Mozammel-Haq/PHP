<?php

class Student {
    public $id, $name, $addr;

    // Constructor to initialize student details

    public function __construct($id, $name, $addr) {
        $this->id = $id;
        $this->name = $name;
        $this->addr = $addr;
    }

    public static function studentTable(){
        $studentDetails = file("studentDetails.txt", FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

        $html = "<table>";

        $html .= "<tr><th>ID</th><th>Name</th><th>Address</th><th>Action</th></tr>";

        foreach($studentDetails as $row){
            list($id, $name, $addr) = explode(",",$row);

            $html .= "<tr><td>{$id}</td><td>{$name}</td><td>{$addr}</td><td><a href='index.php?findID={$id}'><button>Edit</button><a><a href='index.php?id={$id}'><button>Delete</button><a></td></tr>";
        }
        $html .= "</table>";

        return $html;
    }

    public function save(){
        $studentDetails = $this->id . "," . $this->name . "," . $this->addr;
        if(filesize("studentDetails.txt")>0){
            $studentDetails = PHP_EOL.$studentDetails;
        }

        file_put_contents("studentDetails.txt",$studentDetails,FILE_APPEND);
        return true;
    }

    public static function delete($stuentID){
        $studentDetails = file("studentDetails.txt");

        $student =[];

        foreach($studentDetails as $oneStudent){
            list($id) = explode(",",$oneStudent);

            if($id != $stuentID){
                $student[]= $oneStudent;
            }
        }

        file_put_contents("studentDetails.txt", $student);
        return true;
    }
    
    public function update(){
        $studentDetails = file("studentDetails.txt");

        $student = "";

        foreach ($studentDetails as $oneStudent) {
            list($id) = explode(",", $oneStudent);

            if ($id == $this->id) {
                $student .= $this->id."," .$this->name . ",". $this->addr;
            }else{
                $student .= $oneStudent;
            }
        }

        file_put_contents("studentDetails.txt", $student);
        return true;
    }

    public static function find($stuentID){
        $studentDetails = file("studentDetails.txt");

        $student = [];

        foreach ($studentDetails as $oneStudent) {
            list($id,$name,$addr) = explode(",", $oneStudent);

            if ($id != $stuentID) {
                $student = ["id"=>$id,"name"=>$name,"addr"=>$addr];
                break;
            }
        }
        return $student;
    }




 


}





?>