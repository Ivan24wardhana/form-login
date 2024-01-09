<?php
session_start();
require_once 'koneksi.php';

$loginError = '';

if (isset($_POST['masuk'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // enkripsi password dengan MD5
    $hashedPassword = md5($password);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$hashedPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header('Location: home.php');
        exit;
    } else {
        $loginError = 'Username dan password salah';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
        }
        .card {
            border: 0;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border: 0;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Login</h2>
        </div>
        <div class="card-body">
            <?php
            if ($loginError) {
                echo '<div class="alert alert-danger" role="alert">' . $loginError . '</div>';
            }
            ?>
            <form action="index.php" method="post">
                <input type="hidden" name="masuk" value="1">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                <p class="mt-3 text-center">Belum punya akun? <a href="register.php">Register disini</a>.</p>
            </form>
        </div>
    </div>
</div>

</body>
</html>

<?php
$conn->close();
?>
