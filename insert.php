<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hair Harmony - Personal Info</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            const phoneInput = document.getElementById('phone');
            const phonePattern = /^[0-9]{10}$/; // 10 digit number pattern
            
            if (!phonePattern.test(phoneInput.value)) {
                alert("Please enter a valid phone number (10 digits).");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Insert Record</h1>
        <form action="insert2.php" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required minlength="2" maxlength="50">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" class="form-control" required minlength="2" maxlength="50">
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" id="state" name="state" class="form-control" required minlength="2" maxlength="50">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-control" required>
                    <option value="" disabled selected>Select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" class="form-control" required pattern="[0-9]{10}" placeholder="1234567890">
                <small class="form-text text-muted">Format: 10 digits, e.g., 1234567890</small>
            </div>
            <div class="form-group">
                <label for="email">Email ID:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
    </div>
</body>
</html>
