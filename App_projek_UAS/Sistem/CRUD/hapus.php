<?php
$data = $db->get('data', "id_data = '$id_data'");
if ($data) {
    // Hapus file gambar di folder
    unlink("Gambar/uploads/" . $data['Gambar']);
    // Hapus data di database
    $db->delete('data', "id_data = '$id_data'");
}
header("Location: ../home");
exit();
?>