
<link rel="stylesheet" href="style.css">
<?php
require_once "Database.php";

$db = \Database::getInstance()->getConnection();

$sql = $db->query("SELECT * FROM students");

$rows = $sql->fetchAll(PDO::FETCH_ASSOC);

echo "<table border='1'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Adress</th>";
echo "<th>Country</th>";
echo "<th>Gender</th>";
echo "<th>Skills</th>";
echo "<th>Department</th>";
echo "<th colspan='3'>Actions</th>";
echo "</tr>";

foreach($rows as $r){
    echo "<tr>";
    echo "<td>" . $r['id'] . "</td>";
    echo "<td>" . $r['first_name'] . " " . $r['last_name'] . "</td>";
    echo "<td>" . $r['address'] . "</td>";
    echo "<td>" . $r['country'] . "</td>";    
    echo "<td>" . $r['gender'] . "</td>";
    echo "<td>" . $r['skills'] . "</td>";
    echo "<td>" . $r['department'] . "</td>";
    echo "<td><a href='edit.php?id=" . $r['id'] . "'>Edit</a></td> ";
    echo "<td><a href='delete.php?id=" . $r['id'] . "'>Delete</a></td>";
    echo "<td><a href='view.php?id=" . $r['id'] . "'>View</a></td> ";
    echo "</tr>";
    
}
echo "</table>";
?>
