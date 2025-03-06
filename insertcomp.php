<?php 
session_start(); // Start the session

// Database credentials
$servername = "localhost";
$username = "root";        
$password = "";            
$dbname = "hair_harmony";  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collecting data from the form
$user_id = intval($_POST['user_id']);
$hair_texture = htmlspecialchars($_POST['hair_texture']);
$hair_condition = htmlspecialchars($_POST['hair_condition']);
$dandruff = htmlspecialchars($_POST['dandruff']);
$hairfall = htmlspecialchars($_POST['hairfall']);
$scalp = htmlspecialchars($_POST['scalp']);

// Insert hair type information into the database
$stmt = $conn->prepare("INSERT INTO h_type (user_id, hair_texture, hair_condition, dandruff, hairfall, scalp) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssss", $user_id, $hair_texture, $hair_condition, $dandruff, $hairfall, $scalp);
$stmt->execute();
$stmt->close();

// Store user data in session to pass to view_products.php
$_SESSION['user_id'] = $user_id;
$_SESSION['hair_texture'] = $hair_texture;
$_SESSION['hair_condition'] = $hair_condition;
$_SESSION['dandruff'] = $dandruff;
$_SESSION['hairfall'] = $hairfall;
$_SESSION['scalp'] = $scalp; 

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Insert</title>
    
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
   
    <form method="POST">
        <div class="form-group text-center">
            <h2>Record Inserted</h2><br><br>
            <a href="operation.php" class="btn btn-primary">Click to go to Admin Dashboard</a>
        </div>
    </form>
</div>
</body>
</html>
