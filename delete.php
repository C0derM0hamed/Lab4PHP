<?php
require_once "Database.php";

if (!isset($_GET['id'])) {
    echo "No ID provided.";
    exit;
}

$id = trim($_GET['id']);

try {

    $db = \Database::getInstance()->getConnection();

 
    $stmt = $db->prepare("DELETE FROM students WHERE id = ?");
    $stmt->execute([$id]);


    if ($stmt->rowCount() == 0) {
        echo "Record not found.";
        exit;
    }

    header("Location: list.php");
    exit;

} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
}
?>