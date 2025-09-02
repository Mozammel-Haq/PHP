<?php
include_once "student.class.php";

if (isset($_POST["addStudent"])) {
    $name = $_POST["name"];
    $batch = $_POST["batch"];
    $result = $_POST["result"];

    $student = new Student($name, $batch, $result);
    $save = $student->saveStudent();
    if ($save) {
        echo $save;
        unset($_POST["name"]);
        unset($_POST["batch"]);
        unset($_POST["result"]);
    }
}

// Delete

if (isset($_GET["deleteID"])) {
    $id = $_GET["deleteID"];
    Student::deleteStudent($id);
}
// Update
if (isset($_POST["updateStudent"])) {
    $name = $_POST["name"];
    $batch = $_POST["batch"];
    $result = $_POST["result"];
    $id = $_POST["id"] ?? null;

    $student = new Student($name, $batch, $result, $id);
    $update = $student->updateStudent();
    if ($update) {
        echo $update;
        unset($_POST["name"]);
        unset($_POST["batch"]);
        unset($_POST["result"]);
    }
}
// Find
$findStudent = null;
if (isset($_GET["editID"])) {
    $id = $_GET["editID"];
    $findStudent = Student::findStudent($id);
}

?>



<?php
if (is_null($findStudent)) { ?>
    <form action="home.php" method="post">
        <label for="name">Enter The Student Name:</label>
        <input type="text" name="name" id="name">

        <label for="batch">Enter The Student Batch:</label>
        <input type="text" name="batch" id="batch">

        <select name="result" id="result">
            <option value="">Select Result</option>
            <option value="A+">A+</option>
            <option value="A">A</option>
            <option value="A-">A-</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
        <input type="submit" value="Add Student" name="addStudent">
    </form>

<?php
} else {

?>
    <form action="home.php" method="post">
        <input type="hidden" name="id" value="<?php echo $findStudent['id']; ?>">

        <label for="name">Enter The Student Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $findStudent["name"] ?>">

        <label for="batch">Enter The Student Batch:</label>
        <input type="text" name="batch" id="batch" value="<?php echo $findStudent["batch"] ?>">

        <select name="result" id="result">
            <option value="">Select Result</option>
            <option value="A+" <?php if ($findStudent["result"] == "A+") echo "selected"; ?>>A+</option>
            <option value="A" <?php if ($findStudent["result"] == "A") echo "selected"; ?>>A</option>
            <option value="A-" <?php if ($findStudent["result"] == "A-") echo "selected"; ?>>A-</option>
            <option value="B" <?php if ($findStudent["result"] == "B") echo "selected"; ?>>B</option>
            <option value="C" <?php if ($findStudent["result"] == "C") echo "selected"; ?>>C</option>
        </select>
        <input type="submit" value="Update Student" name="updateStudent">
    </form>

<?php } ?>