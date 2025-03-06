<?php 
// Database credentials
$servername = "localhost"; // or your database server address
$username = "root";        // your MySQL username
$password = "";            // your MySQL password
$dbname = "hair_harmony";  // the database you want to connect to

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ""; // Initialize message variable

if (isset($_POST['delete'])) {
    $name = $_POST['name'];
    
    // Delete query
    $query = mysqli_query($conn, "DELETE FROM user_info WHERE name='$name'");

    // Check if any rows were affected
    if (mysqli_affected_rows($conn) > 0) {
        $message = "Record deleted successfully.";
    } else {
        $message = "Record not found.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Delete</title>
    
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
    <form action="operation.php" method="POST">
        <div class="form-group text-center">
            <h2>Delete Record</h2><br>
            
        </div>
    </form>

    <?php if (!empty($message)): ?>
        <div class="alert alert-info text-center">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?> <div class="form-group text-center">
    <br><button type="submit" name="update" class="btn btn-primary">Click To Go To Dashboard</button>
</div></div>

</body>
</html>
