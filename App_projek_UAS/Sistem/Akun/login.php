<?php
// Pastikan file ini di-include oleh indeks.php, sehingga variabel $db sudah tersedia

$error = "";

// Logika Proses Login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Mencari user di tabel 'users' (Ingat: kita sudah sepakat pakai tabel users)
    // Gunakan fungsi get() dari class Database kamu
    $data = $db->get('users', "username = '$user' AND password = '$pass'");

    if ($data) {
        // Jika data ditemukan, simpan informasi ke session
        $_SESSION['user_id'] = $data['id_user'];
        $_SESSION['nama']    = $data['username'];
        $_SESSION['role']    = $data['role']; // admin atau user

        // Redirect ke halaman home
        header("Location: home");
        exit();
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MyCatalog UAS</title>
    <link href="Assets/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .login-container { margin-top: 100px; max-width: 400px; }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="login-container shadow p-4 bg-white rounded">
        <h3 class="text-center mb-4">Login Sistem</h3>
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error; ?></div>
        <?php endif; ?>

        <form action="login" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" required placeholder="Masukkan username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required placeholder="Masukkan password">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Masuk</button>
            </div>
        </form>
        
        <div class="text-center mt-3">
            <small class="text-muted">Gunakan akun Admin atau User untuk masuk.</small>
        </div>
    </div>
</div>

<script src="Assets/bootstrap.bundle.min.js"></script>
</body>
</html>