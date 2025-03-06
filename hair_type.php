
<?php 
// Database credentials
$servername = "localhost"; // or your database server address
$username = "root";        // your MySQL username
$password = "";            // your MySQL password
$dbname = "hair_harmony";  // the database you want to connect to

session_start(); // Start session to store error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize user data
    $name = htmlspecialchars(trim($_POST['name']));
    $city = htmlspecialchars(trim($_POST['city']));
    $state = htmlspecialchars(trim($_POST['state']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));
   

    // Initialize an array to hold validation errors
    $errors = [];

    // Validation
    if (empty($name) || strlen($name) < 2) {
        $errors[] = "Please enter a valid name with at least 2 characters.";
    }
    if (empty($city) || strlen($city) < 2) {
        $errors[] = "Please enter a valid city with at least 2 characters.";
    }
    if (empty($state) || strlen($state) < 2) {
        $errors[] = "Please enter a valid state with at least 2 characters.";
    }
    if (!preg_match('/^[0-9]{10}$/', $phone)) {
        $errors[] = "Please enter a valid 10-digit phone number.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    // If there are no errors, proceed to database insertion
    if (empty($errors)) {
        // Connect to database
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert user data into database
        $stmt = $conn->prepare("INSERT INTO user_info (name, city, state, gender, phone, email) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("ssssss", $name, $city, $state, $gender, $phone, $email);
            $stmt->execute();
            $user_id = $stmt->insert_id; // Get the last inserted user ID
            $stmt->close();
            $conn->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        // Store errors in session to display them later
        $_SESSION['errors'] = $errors;
        header("Location: home.php"); // Redirect back to form
        exit();
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hair Harmony - Hair Type</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Select Your Hair Type</h1>
        
        <?php if (isset($_SESSION['errors'])): ?>
            <div class="alert alert-danger">
                <?php 
                foreach ($_SESSION['errors'] as $error) {
                    echo "<p>$error</p>";
                }
                unset($_SESSION['errors']); // Clear errors after displaying
                ?>
            </div>
        <?php endif; ?>

        <form action="view_products.php" method="POST">
            <input type="hidden" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
            <div class="form-group">
                <label for="hair_texture">Hair Texture :</label>
                <select id="hair_texture" name="hair_texture" class="form-control" required>
                    <option value="" disabled selected>Select your hair texture</option>
                    <option value="curly">Curly</option>
                    <option value="straight">Straight</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hair_condition">Hair Condition :</label>
                <select id="hair_condition" name="hair_condition" class="form-control" required>
                    <option value="" disabled selected>Select your hair condition</option>
                    <option value="dry">Dry</option>
                    <option value="oily">Oily</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dandruff">Having Dandruff ?</label>
                <select id="dandruff" name="dandruff" class="form-control" required>
                    <option value="" disabled selected>Select as per your choice</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="less">Yes , but very less</option>
                    <option value="more">Having too much</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hairfall">Facing Hair Fall ?</label>
                <select id="hairfall" name="hairfall" class="form-control" required>
                    <option value="" disabled selected>Select as per your choice</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="less">Yes , but very less</option>
                    <option value="more">Having too much</option>
                </select>
            </div>
            <div class="form-group">
                <label for="scalp">Scalp Condition :</label>
                <select id="scalp" name="scalp" class="form-control" required>
                    <option value="" disabled selected>Select as per your choice</option>
                    <option value="dry">Dry</option>
                    <option value="oily">Oily</option>
                    <option value="mid">Mid</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
    </div>
</body>
</html>
