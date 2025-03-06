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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hair Harmony - Recommended Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Recommended Products</h1><br> 

        <?php 
        // Fetch all products
        $stmt = $conn->prepare("SELECT id, name, price, image FROM product");
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if there are products
        if ($result->num_rows > 0) {
            echo "<div class='row'>";
            while ($row = $result->fetch_assoc()) {
                // Validate and sanitize output
                $image = htmlspecialchars($row['image']);
                $name = htmlspecialchars($row['name']);
                $price = number_format((float)$row['price'], 2);
                $productId = intval($row['id']);

                // Display product card
                echo "<div class='col-md-4 mb-4'>
                        <div class='card' style='width: 18rem;'>
                            <img src='$image' class='card-img-top' alt='$name'>
                            <div class='card-body'>
                                <h5 class='card-title'>$name</h5>
                                <p class='card-text'>\$$price</p>
                                <a href='bill.php?product_id=$productId' class='btn btn-primary'>Buy Now</a>
                            </div>
                        </div>
                    </div>";
            }
            echo "</div>";
        } else {
            echo "<p>No products found.</p>";
        }

        $stmt->close();
        // Close the database connection
        $conn->close(); 
        ?>
    </div>
</body>
</html>
