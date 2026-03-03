<link rel="stylesheet" href="style.css">

<?php
require_once "Database.php";

if (!isset($_GET['id'])) {
    echo "No ID provided.";
    exit;
}

$id = trim($_GET['id']);

try {

    $db = \Database::getInstance()->getConnection();

    $stmt = $db->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->execute([$id]);

    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$student) {
        echo "Record not found.";
        exit;
    }


    $skillsArray = $student['skills'] ? explode(",", $student['skills']) : [];

} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
    exit;
}
?>

<h2>Edit Student</h2>

<form action="update.php" method="POST">

<input type="hidden" name="id" value="<?= $student['id']?>">

First Name:
<input type="text" name="FirstName"
value="<?= $student['first_name']?>"><br><br>

Last Name:
<input type="text" name="LastName"
value="<?= $student['last_name'] ?>"><br><br>

Address:
<input type="text" name="Address"
value="<?= $student['address'] ?>"><br><br>

Country:
<input type="text" name="country"
value="<?=$student['country'] ?>"><br><br>

Gender:
<input type="radio" name="Gender" value="Male"
<?= $student['gender'] == "Male" ? "checked" : "" ?>> Male

<input type="radio" name="Gender" value="Female"
<?= $student['gender'] == "Female" ? "checked" : "" ?>> Female
<br><br>

Skills:
<input type="checkbox" name="skills[]" value="PHP"
<?= in_array("PHP", $skillsArray) ? "checked" : "" ?>> PHP

<input type="checkbox" name="skills[]" value="HTML"
<?= in_array("HTML", $skillsArray) ? "checked" : "" ?>> HTML

<input type="checkbox" name="skills[]" value="CSS"
<?= in_array("CSS", $skillsArray) ? "checked" : "" ?>> CSS
<br><br>

Username:
<input type="text" name="username"
value="<?= $student['username'] ?>"><br><br>

Department:
<input type="text" name="department"
value="<?=$student['department'] ?>"><br><br>

<input type="submit" value="Update">

</form>