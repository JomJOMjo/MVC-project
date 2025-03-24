<?php
include 'db.php';

if (isset($_GET['id'])) {
    $departmentID = intval($_GET['id']);
    
   
    $stmt = $conn->prepare("DELETE FROM Department WHERE DepartmentID = ?");
    $stmt->bind_param("i", $departmentID);
    
    if ($stmt->execute()) {
        echo "<script>alert('Department deleted successfully.'); window.location.href='departments.php';</script>";
    } else {
        echo "<script>alert('Error deleting department.'); window.location.href='departments.php';</script>";
    }
    
    $stmt->close();
}

$conn->close();
?>
