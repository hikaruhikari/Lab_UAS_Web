<?php
// Ambil data berdasarkan ID yang dikirim dari routing indeks.php
$data = $db->get('data', "id_data = '$id_data'");

if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='../home';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail - <?= $data['Judul']; ?></title>
    <link href="/App_projek_UAS/Assets/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <img src="/App_projek_UAS/Gambar/uploads/<?= $data['Gambar']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h2 class="card-title"><?= $data['Judul']; ?></h2>
                    <hr>
                    <p class="card-text" style="white-space: pre-line;"><?= $data['Keterangan']; ?></p>
                    <a href="../home" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="Assets/bootstrap.bundle.min.js"></script>
</body>
</html>