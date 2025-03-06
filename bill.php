<?php 
// Database credentials
$servername = "localhost"; // or your database server address
$username = "root";        // your MySQL username
$password = "";            // your MySQL password
$dbname = "hair_harmony";  // the database you want to connect to

$product = null; // Initialize product variable

if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']); // Validate product_id as an integer

    // Connect to database
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch product details
    $stmt = $conn->prepare("SELECT * FROM product WHERE id = ?");
    
    if ($stmt) {
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if product exists
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        }
        
        $stmt->close();
    } else {
        echo "<p>Error preparing statement: " . $conn->error . "</p>";
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hair Harmony - Bill</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Invoice</h1>
        <?php if ($product): ?>
            <p><strong>Product:</strong> <?php echo htmlspecialchars($product['name']); ?></p>
            <p><strong>Price:</strong> $<?php echo htmlspecialchars(number_format((float)$product['price'], 2)); ?></p>
            <p class='text-center'>Thank you for your purchase!</p>
            <a href='index.php' class='btn btn-primary'>Home</a>
        <?php else: ?>
            <p class="text-danger">Invalid product. Please go back and select a valid item.</p>
            <a href='index.php' class='btn btn-secondary'>Go Back</a>
        <?php endif; ?>
    </div>
</body>
</html>
