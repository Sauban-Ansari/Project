<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hair Harmony - Display Record</title>
    
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
   
    <form action="displaycomp.php" method="POST">
            <div class="form-group"><center>
                <h2>Display Record</h2><br><br>
                <label for="name">Name</label><br><br>
                <input type="text" id="name" name="name" class="form-control" required minlength="2" maxlength="50"><br><br>
                <button type="submit" name="display" class="btn btn-primary">Display</button>
            </center>
            </div>
    </form>
</div>
</body>
</html>