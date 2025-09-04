<?php 
    require '../class/LoginController.php';

    $lc = new LoginController();
    if(isset($_POST['loginBtn'])){
        $lc->login($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Tambahkan link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <!-- Halaman Login -->
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
        <h3 class="text-center mb-3">Login</h3>
            <form method="POST">
                <!-- Username Input -->
                <div class="mb-3">
                    <label for="username" class="form-label">Email</label>
                    <input name="email" type="text" class="form-control" id="username" placeholder="Masukkan Email" value="<?= !empty($_COOKIE['email']) ? $_COOKIE['email'] : "" ?>">
                </div>
                <!-- Password Input -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Masukkan Password">
                </div>
                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <input name="remember" class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember Me
                    </label>
                </div>
                <!-- Tombol Login -->
                <div class="d-grid">
                    <button name="loginBtn" type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
<!-- Tambahkan link ke Bootstrap JS dan dependensi Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
