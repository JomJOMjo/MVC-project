<?php
include 'db.php';
$result = $conn->query("
    SELECT d.*, c.CollegeName 
    FROM Department d 
    JOIN College c ON d.CollegeID = c.CollegeID
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: url('penguins.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.6);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .panel {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            width: 80%;
            max-width: 900px;
        }
        .panel-title {
            font-weight: bold;
            font-size: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #007bff;
            margin-bottom: 15px;
        }
        .btn-sharp {
            border-radius: 0;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
    <div class="overlay">
       
        <div class="d-flex justify-content-center gap-3 mb-3">
            <a href="index.php" class="btn btn-primary btn-sharp"><i class="fas fa-school"></i> Colleges</a>
            <a href="departments.php" class="btn btn-secondary btn-sharp"><i class="fas fa-building"></i> Departments</a>
        </div>

    
        <div class="panel">
            <div class="panel-title">List of Departments</div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
                        <th>Code</th>
                        <th>College</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['DepartmentID'] ?></td>
                            <td><?= $row['DepartmentName'] ?></td>
                            <td><?= $row['DepartmentCode'] ?></td>
                            <td><?= $row['CollegeName'] ?></td>
                            <td>
                                <a href="edit_department.php?id=<?= $row['DepartmentID'] ?>" class="btn btn-success btn-sm btn-sharp">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="delete_department.php?id=<?= $row['DepartmentID'] ?>" class="btn btn-danger btn-sm btn-sharp" onclick="return confirm('Sure naka i-delete ni?')">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
