<?php

// No specific logic needed for the dashboard; it's just a navigation page.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Select Operation as per choice</h2><br>
    <h2 class="text-center">Admin Dashboard</h2><br><br>
    <form method="POST">
        <div class="form-group text-center">
            <a href="insert.php" class="btn btn-success">Insert</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="update.php" class="btn btn-warning">Update</a><br><br>
            <a href="delete.php" class="btn btn-danger">Delete</a>&nbsp;&nbsp;&nbsp;
            <a href="display.php" class="btn btn-info">Display</a><br><br><br><br>
            <a href="index.php" class="btn btn-primary">Log Out</a>
        </div>
    </form>
</div>
</body>
</html>
