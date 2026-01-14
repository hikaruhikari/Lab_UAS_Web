<?php
$data = $db->get('data', "id_data = '$id_data'");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data</title>
    <link href="/App_projek_UAS/Assets/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h3>Ubah Data: <?= $data['Judul']; ?></h3>
    <form action="../proses" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="aksi" value="ubah">
        <input type="hidden" name="id_data" value="<?= $data['id_data']; ?>">
        <input type="hidden" name="gambar_lama" value="<?= $data['Gambar']; ?>">
        
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="<?= $data['Judul']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="5" required="<?= $data['Keterangan']; ?>"></textarea>
        </div>
        <div class="mb-3">
            <label>Gambar Baru (Kosongkan jika tidak diganti)</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-warning">Update Data</button>
        <a href="../home" class="btn btn-secondary">Batal</a>
    </form>
</div>
<script src="Assets/bootstrap.bundle.min.js"></script>
</body>
</html>