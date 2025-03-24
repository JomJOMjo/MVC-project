<?php
include 'db.php';
$colleges = $conn->query("SELECT * FROM College WHERE IsActive = 1");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $collegeID = $_POST['college'];
    $name = $_POST['name'];
    $code = $_POST['code'];

    if (!empty($name) && !empty($code)) {
        $stmt = $conn->prepare("INSERT INTO Department (CollegeID, DepartmentName, DepartmentCode, IsActive) VALUES (?, ?, ?, 1)");
        $stmt->bind_param("iss", $collegeID, $name, $code);
        $stmt->execute();
        header("Location: departments.php");
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
    <title>Add Department</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: url('penguins.jpg') no-repeat center center fixed;
            background-size: cover;
            filter: grayscale(100%); /* Black and white effect */
        }
        .overlay {
            background: rgba(0, 0, 0, 0.6); /* Dark overlay for readability */
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
            max-width: 600px;
        }
        .panel-title {
            font-weight: bold;
            font-size: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #28a745;
            margin-bottom: 15px;
        }
        .btn-sharp {
            border-radius: 0;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div class="panel">
            <div class="panel-title text-success"><i class="fas fa-plus"></i> Add Department</div>
            <form method="post">
                <div class="mb-3">
                    <label for="college" class="form-label">Select College</label>
                    <select class="form-select" id="college" name="college" required>
                        <?php while ($row = $colleges->fetch_assoc()) { ?>
                            <option value="<?= $row['CollegeID'] ?>"><?= $row['CollegeName'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Department Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="code" class="form-label">Department Code</label>
                    <input type="text" class="form-control" id="code" name="code" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="departments.php" class="btn btn-secondary btn-sharp"><i class="fas fa-arrow-left"></i> Back</a>
                    <button type="submit" class="btn btn-success btn-sharp"><i class="fas fa-save"></i> Save Department</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
