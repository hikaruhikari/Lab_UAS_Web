<?php
// Pastikan file ini dipanggil melalui indeks.php, sehingga $db sudah tersedia

// 1. Konfigurasi Pagination
$batas = 6; // Menampilkan 6 data per halaman
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

// 2. Logika Filter Pencarian
$keyword = isset($_GET['cari']) ? $_GET['cari'] : '';
$where = "";
if (!empty($keyword)) {
    // Sanitasi keyword untuk keamanan
    $k = addslashes($keyword);
    $where = "Judul LIKE '%$k%' OR Keterangan LIKE '%$k%'";
}

// 3. Ambil Data dari Database (OOP)
$total_data = $db->count('data', $where); // Menggunakan fungsi count di database.php
$total_halaman = ceil($total_data / $batas);

// Query untuk mengambil data dengan LIMIT dan OFFSET (Pagination)
$query_sql = "SELECT * FROM data " . ($where ? "WHERE $where " : "") . "LIMIT $halaman_awal, $batas";
$data_katalog = $db->query($query_sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Informasi - UAS</title>
    <link rel="stylesheet" href="Assets/bootstrap.min.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="home">MyCatalog UAS</a>
        <div class="d-flex">
            <span class="navbar-text me-3 text-white">Halo, <?= $_SESSION['nama']; ?> (<?= $_SESSION['role']; ?>)</span>
            <a href="logout" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="text-center mb-4">Daftar Katalog</h2>

    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <form action="home" method="GET" class="d-flex">
                <input type="text" name="cari" class="form-control me-2" placeholder="Cari judul atau keterangan..." value="<?= htmlspecialchars($keyword); ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>

    <?php if ($_SESSION['role'] === 'admin'): ?>
        <div class="mb-3">
            <a href="tambah" class="btn btn-success">+ Tambah Data Baru</a>
        </div>
    <?php endif; ?>

    <div class="row">
        <?php if ($data_katalog->num_rows > 0): ?>
            <?php while($row = $data_katalog->fetch_assoc()): ?>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="Gambar/uploads/<?= $row['Gambar']; ?>" class="card-img-top" alt="<?= $row['Judul']; ?>" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['Judul']; ?></h5>
                            <p class="card-text text-muted"><?= substr($row['Keterangan'], 0, 100); ?>...</p>
                        </div>
                        <div class="card-footer bg-white border-top-0 d-flex justify-content-between">
                            <a href="detail/<?= $row['id_data']; ?>" class="btn btn-info btn-sm text-white">Detail</a>
                            
                            <?php if ($_SESSION['role'] === 'admin'): ?>
                                <div>
                                    <a href="ubah/<?= $row['id_data']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                                    <a href="hapus/<?= $row['id_data']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p class="alert alert-secondary">Data tidak ditemukan.</p>
            </div>
        <?php endif; ?>
    </div>

    <nav class="mt-4">
        <ul class="pagination justify-content-center">
            <?php for($i=1; $i<=$total_halaman; $i++): ?>
                <li class="page-item <?= ($halaman == $i) ? 'active' : ''; ?>">
                    <a class="page-link" href="home?halaman=<?= $i; ?>&cari=<?= $keyword; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

<script src="Assets/bootstrap.bundle.min.js"></script>
</body>
</html>