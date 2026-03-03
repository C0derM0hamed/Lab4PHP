<?php
require_once "Database.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    echo "Invalid request.";
    exit;
}

if (!isset($_POST['id'])) {
    echo "No ID provided.";
    exit;
}

$id = trim($_POST['id']);

$first  = trim($_POST['FirstName']);
$last   = trim($_POST['LastName']);
$address = trim($_POST['Address']);
$country = trim($_POST['country']);
$gender  = trim($_POST['Gender']);
$username = trim($_POST['username']);
$department = trim($_POST['department']);

$skills = isset($_POST['skills'])
    ? implode(",", $_POST['skills'])
    : "";

try {

    $db = \Database::getInstance()->getConnection();

    $sql = "UPDATE students SET
            first_name = ?,
            last_name = ?,
            address = ?,
            country = ?,
            gender = ?,
            username = ?,
            skills = ?,
            department = ?
            WHERE id = ?";

    $stmt = $db->prepare($sql);

    $stmt->execute([
        $first,
        $last,
        $address,
        $country,
        $gender,
        $username,
        $skills,
        $department,
        $id
    ]);

    header("Location: list.php");
    exit;

} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
}
?>