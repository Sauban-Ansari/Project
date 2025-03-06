<?php   

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hair_harmony";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo "Error Connecting Database<br>";
}

if (isset($_POST['display'])) {
    
    $name = $_POST['name'];

    $query = mysqli_query($conn, "SELECT * FROM user_info WHERE name='$name'");

    echo "<center>";
    echo "<table border=1>";
    echo "<th>Name</th>";
    echo "<th>City</th>";
    echo "<th>State</th>";
    echo "<th>Gender</th>";
    echo "<th>Phone</th>";
    echo "<th>Email</th>";

    // Check if any rows were returned
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($name) . "</td>";
            echo "<td>" . htmlspecialchars($row['city']) . "</td>";
            echo "<td>" . htmlspecialchars($row['state']) . "</td>";
            echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "</tr>";
        }
    } else {
        // If no records found, display a message
        echo "<tr><td colspan='6'>Record not found</td></tr>";
    }
    
    echo "</table>";
    echo "</center>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Display</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
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
<body><br><br>

<div class="container">
    <form method="POST">
        <div class="form-group text-center">
            <h2>Record Displayed</h2><br><br>
            <a href="operation.php" class="btn btn-primary">Click to go to Admin Dashboard</a>
        </div>
    </form>
</div>
<br><br><br>
</body>
</html>
