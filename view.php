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

    echo "<h2>Student Details</h2>";
    echo "<table border='1' cellpadding='8'>";

    echo "<tr><td>ID</td><td>" . $student['id'] . "</td></tr>";
    echo "<tr><td>First Name</td><td>" . $student['first_name'] . "</td></tr>";
    echo "<tr><td>Last Name</td><td>" . $student['last_name'] . "</td></tr>";
    echo "<tr><td>Address</td><td>" . $student['address'] . "</td></tr>";
    echo "<tr><td>Country</td><td>" . $student['country'] . "</td></tr>";
    echo "<tr><td>Gender</td><td>" . $student['gender'] . "</td></tr>";
    echo "<tr><td>Username</td><td>" . $student['username'] . "</td></tr>";

    echo "<tr><td>Skills</td><td>";

    $skillsArray = explode(",", $student['skills']);
    foreach ($skillsArray as $skill) {
        echo ($skill) . "<br>";
    }

    echo "</td></tr>";

    echo "<tr><td>Department</td><td>" . $student['department'] . "</td></tr>";

    echo "</table>";

} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
}
?>