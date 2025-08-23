<?php



// Form Submit

if (isset($_POST["submit_btn"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $addr = $_POST["addr"];

    $student = new Student($id, $name,  $addr);
    $save = $student->save();

    if ($save) {
        header("Location: index.php");
        unset($_POST["id"]);
        unset($_POST["name"]);
        unset($_POST["addr"]);
    }
}

// Delete Function 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    Student::delete($id);
    header("Location: index.php");
    exit;
}

// Edit Student Details
$findStudent = null;
if (isset($_GET['findID'])) {
    $id = $_GET['findID'];
    $findStudent = Student::find($id);
}

// Update Function
if (isset($_POST["update_btn"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $addr = $_POST["addr"];

    $student = new Student($id, $name,  $addr);
    $update = $student->update();

    if ($update) {
        header("Location: index.php");
        unset($_POST["id"]);
        unset($_POST["name"]);
        unset($_POST["addr"]);
    }
}



?>



<form method="POST" action="index.php">
    <label for="id">ID:</label>
    <input type="text" id="id" name="id">
    <br>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <br>
    <label for="addr">Address:</label>
    <input type="text" id="addr" name="addr">
    <br>
    <button type="submit" name="submit_btn">Add Student</button>
    <button name="update_btn">Update</button>
</form>