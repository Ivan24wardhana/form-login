<?php
require_once 'koneksi.php';

$registrationError = '';
$registrationSuccess = '';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // enkripsi password dengan MD5
    $hashedPassword = md5($password);

    // periksa apakah username sudah digunakan
    $checkUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkUsernameResult = $conn->query($checkUsernameQuery);

    if ($checkUsernameResult->num_rows > 0) {
        $registrationError = 'Nama pengguna sudah ada. Silakan pilih nama pengguna lain.';
    } else {
        // insert data ke database
        $insertQuery = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
        $insertResult = $conn->query($insertQuery);

        if ($insertResult) {
            $registrationSuccess = 'Akun berhasil dibuat. Anda sekarang dapat masuk.';
        } else {
            $registrationError = 'Registrasi gagal. Silakan coba lagi.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #28a745;
            color: #fff;
            text-align: center;
            font-weight: bold;
        }
        .btn-success {
            background-color: #28a745;
            border: 0;
        }
        .btn-success:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Register</h2>
        </div>
        <div class="card-body">
            <?php
            if ($registrationError) {
                echo '<div class="alert alert-danger" role="alert">' . $registrationError . '</div>';
            }
            if ($registrationSuccess) {
                echo '<div class="alert alert-success" role="alert">' . $registrationSuccess . '</div>';
            }
            ?>
            <form action="register.php" method="post">
                <input type="hidden" name="register" value="1">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-success btn-block">Register</button>
            </form>
            <p class="mt-3 text-center">Sudah punya akun? <a href="index.php">Login disini</a>.</p>
        </div>
    </div>
</div>

</body>
</html>

<?php
$conn->close();
?>
