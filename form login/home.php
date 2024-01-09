<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar-brand img {
            height: 40px; /* Sesuaikan tinggi logo sesuai kebutuhan */
            width: auto; /* Biarkan lebar menyesuaikan agar logo tidak terlalu besar */
            margin-right: 10px;
        }
        .navbar-brand a {
            color: #fff;
            font-weight: bold;
        }
        .navbar-nav a {
            color: #fff;
            margin-right: 15px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            margin-top: 100px;
        }
        .card {
            border: 0;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            font-weight: bold;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .card-body {
            padding: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border: 0;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            Your Website
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Alamat</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">Welcome, <?php echo $username; ?>!</h2>
        </div>
        <div class="card-body">
            <p class="lead">This is your home page. You are logged in as <?php echo $username; ?>.</p>
            <p>Feel free to explore and enjoy the features of our website.</p>
            <a href="#" class="btn btn-primary">Explore More</a>
        </div>
    </div>
</div>

</body>
</html>
