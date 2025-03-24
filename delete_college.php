<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM College WHERE CollegeID = $id");

    header("Location: index.php");
}
?>
