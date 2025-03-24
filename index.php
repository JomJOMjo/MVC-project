<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
   
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
            max-width: 600px;
            text-align: center;
        }
        .btn-sharp {
            border-radius: 0;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div class="panel">
            <h2 class="text-primary">CRUD operations_Exercise 11</h2>
            

            
            <div class="d-grid gap-3">
                <a href="colleges.php" class="btn btn-primary btn-lg btn-sharp">
                    <i class="fas fa-school"></i> View Colleges
                </a>
                <a href="departments.php" class="btn btn-secondary btn-lg btn-sharp">
                    <i class="fas fa-building"></i> View Departments
                </a>
                <a href="add_college.php" class="btn btn-success btn-lg btn-sharp">
                    <i class="fas fa-plus"></i> Add College
                </a>
                <a href="add_department.php" class="btn btn-warning btn-lg btn-sharp">
                    <i class="fas fa-plus"></i> Add Department
                </a>
            </div>
        </div>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
