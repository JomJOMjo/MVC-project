<?php
include 'db.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM College WHERE CollegeID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $college = $result->fetch_assoc();
}


if (isset($_POST['update_college'])) {
    $id = $_POST['id'];
    $name = $_POST['college_name'];
    $code = $_POST['college_code'];

    if (!empty($name) && !empty($code)) {
        $stmt = $conn->prepare("UPDATE College SET CollegeName = ?, CollegeCode = ? WHERE CollegeID = ?");
        $stmt->bind_param("ssi", $name, $code, $id);
        if ($stmt->execute()) {
            header("Location: index.php?success=updated");
            exit();
        }
    } else {
        echo "<script>alert('All fields are required');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit College</title>

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
            <div class="panel-title">Edit College</div>
            <form method="POST">
                <input type="hidden" name="id" value="<?= $college['CollegeID'] ?>">

                <div class="mb-3">
                    <label class="form-label">College Name</label>
                    <input type="text" name="college_name" class="form-control" value="<?= htmlspecialchars($college['CollegeName']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">College Code</label>
                    <input type="text" name="college_code" class="form-control" value="<?= htmlspecialchars($college['CollegeCode']) ?>" required>
                </div>

                <button type="submit" name="update_college" class="btn btn-success w-100 btn-sharp">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
