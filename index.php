<?php

// Start PHP session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hair Harmony</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }
        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 800px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            margin: 0;
            font-size: 2em;
        }
        h2 {
            margin-top: 0;
            font-size: 1.8em;
        }
        p {
            font-size: 1.2em;
            line-height: 1.6em;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1.2em;
            color: #fff;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<header>
    <h1>Hair Harmony</h1>
</header>
<br><br>
<div class="container">
    <h2>Welcome to Hair Harmony!</h2>
    <p>Hair Harmony is your go-to destination for all things hair care. Whether you're looking for tips, trends, or products to achieve the perfect look, we've got you covered. Our website offers personalized advice, expert reviews, and the latest in hair fashion.</p>
    <a href="home.php" class="button">Start Trial</a>
</div>

</body>
</html>
