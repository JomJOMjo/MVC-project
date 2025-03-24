<?php
include 'db.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM Department WHERE DepartmentID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $department = $result->fetch_assoc();
}


if (isset($_POST['update_department'])) {
    $id = $_POST['id'];
    $name = $_POST['department_name'];
    $code = $_POST['department_code'];
    $college_id = $_POST['college_id'];

    $stmt = $conn->prepare("UPDATE Department SET DepartmentName = ?, DepartmentCode = ?, CollegeID = ? WHERE DepartmentID = ?");
    $stmt->bind_param("ssii", $name, $code, $college_id, $id);
    if ($stmt->execute()) {
        header("Location: departments.php?success=updated");
        exit();
    }
}

$colleges = $conn->query("SELECT * FROM College");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Department</title>
    
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
            width: 80%;
            max-width: 500px;
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
    </style>
</head>
<body>
    <div class="overlay">
        
        <div class="d-flex justify-content-center gap-3 mb-3">
            <a href="index.php" class="btn btn-primary btn-sharp"><i class="fas fa-school"></i> Colleges</a>
            <a href="departments.php" class="btn btn-secondary btn-sharp"><i class="fas fa-building"></i> Departments</a>
        </div>

      
        <div class="panel">
            <div class="panel-title">Edit Department</div>
            <form method="POST">
                <input type="hidden" name="id" value="<?= $department['DepartmentID'] ?>">
                
                <div class="mb-3">
                    <label class="form-label">Department Name</label>
                    <input type="text" name="department_name" class="form-control" value="<?= $department['DepartmentName'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Department Code</label>
                    <input type="text" name="department_code" class="form-control" value="<?= $department['DepartmentCode'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">College</label>
                    <select name="college_id" class="form-control" required>
                        <?php while ($college = $colleges->fetch_assoc()) { ?>
                            <option value="<?= $college['CollegeID'] ?>" <?= ($college['CollegeID'] == $department['CollegeID']) ? 'selected' : '' ?>>
                                <?= $college['CollegeName'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" name="update_department" class="btn btn-success w-100 btn-sharp">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
