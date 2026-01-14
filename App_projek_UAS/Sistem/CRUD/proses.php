<?php
$aksi = $_POST['aksi'] ?? '';

if ($aksi == 'tambah') {
    $judul = $_POST['judul'];
    $ket   = $_POST['keterangan'];
    
    // Logika Upload Gambar
    $nama_file = $_FILES['gambar']['name'];
    $tmp_name  = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp_name, "Gambar/uploads/" . $nama_file);

    $db->insert('data', [
        'Judul' => $judul,
        'Keterangan' => $ket,
        'Gambar' => $nama_file
    ]);
    header("Location: home");

} elseif ($aksi == 'ubah') {
    $id    = $_POST['id_data'];
    $judul = $_POST['judul'];
    $ket   = $_POST['keterangan'];
    $gambar_lama = $_POST['gambar_lama'];

    if ($_FILES['gambar']['name'] != "") {
        $nama_file = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "Gambar/uploads/" . $nama_file);
        unlink("Gambar/uploads/" . $gambar_lama); // Hapus foto lama
    } else {
        $nama_file = $gambar_lama;
    }

    $db->update('data', [
        'Judul' => $judul,
        'Keterangan' => $ket,
        'Gambar' => $nama_file
    ], "id_data = '$id'");
    header("Location: home");
}
?>