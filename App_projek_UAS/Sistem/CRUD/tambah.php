<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <link href="Assets/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h3>Tambah Katalog Baru</h3>
    <form action="proses" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="aksi" value="tambah">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="home" class="btn btn-danger">Batal</a>
    </form>
</div>
</body>
</html>