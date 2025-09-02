<?php

include_once "extra/db_config.php";

class Student
{
    public $id, $name, $batch, $result;

    public function __construct($name, $batch, $result, $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->batch = $batch;
        $this->result = $result;
    }

    public static function showStudent()
    {
        global $conn;
        $data = $conn->query("select * from students");

        $html = "<table>";
        $html .= "<tr><th>ID</th><th>Name</th><th>Batch</th><th>Result</th><th>Actions</th></tr>";

        while ($row = $data->fetch_object()) {
            $html .= "<tr><td>{$row->id}</td><td>{$row->name}</td><td>{$row->batch}</td><td>{$row->result}</td><td><button><a href='home.php?editID={$row->id}'>Edit</a></button><button><a href='home.php?deleteID={$row->id}'>Delete</a></button></td></tr>";
        }
        $html .= "</table>";

        return $html;
    }
    public function saveStudent()
    {
        global $conn;
        $save = $conn->query("INSERT into students(name,batch,result)values('$this->name','$this->batch','$this->result')");
        if ($save) {
            return "saved SuccessFully";
        }
    }
    public static function deleteStudent($deleteID)
    {
        global $conn;
        $delete = $conn->query("DELETE from students where id= $deleteID");
        if ($delete) {
            return true;
        }
    }


    public function updateStudent()
    {
        global $conn;
        $update = $conn->query("UPDATE students SET name='{$this->name}',batch='{$this->batch}',result='{$this->result}' WHERE id=$this->id");
        if ($update) {
            return "Updated SuccessFully";
        }
    }

    public static function findStudent($editID)
    {
        global $conn;
        $sql = $conn->query("SELECT * FROM students where id=$editID");
        $data = $sql->fetch_assoc();
        if ($data) {
            return $data;
        }
        return "No data Found";
    }
}
