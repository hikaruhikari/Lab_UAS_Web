# Lab_UAS_Web

berikut penjelasan projek saya yang berhubungan dengan UAS

1. Halaman Login (Autentikasi & Role)

Fungsi: Menjadi gerbang masuk utama sistem.


Elemen Visual: Form input username, password, dan tombol masuk dengan desain card di tengah layar.

Logika Role:

Jika login sebagai Admin, sistem memberikan akses penuh ke fungsi CRUD.

Jika login sebagai User, sistem hanya mengizinkan pencarian dan melihat detail.

Keamanan: Menggunakan Session untuk menjaga status login pengguna.

<img width="1920" height="1080" alt="Screenshot (1128)" src="https://github.com/user-attachments/assets/9eb72db7-e619-45f9-b6eb-d85ad9d7db54" />

NB:

Username: admin123, user123

Password: admin123, user123

2. Halaman Utama (Katalog, Filter, & Pagination)

Layout: Desain responsif (Mobile First) menggunakan sistem Grid Bootstrap. Data ditampilkan dalam bentuk kartu (Card) yang berisi Gambar, Judul, dan cuplikan Keterangan.

Filter Pencarian: Terdapat kolom search di bagian atas. Pengguna bisa mengetik kata kunci untuk mencari data berdasarkan Judul atau Keterangan secara real-time melalui URL.

Pagination: Di bagian bawah terdapat navigasi angka halaman. Data dibatasi (misal 6 per halaman) agar performa aplikasi tetap ringan dan rapi.

<img width="1920" height="1080" alt="Screenshot (1129)" src="https://github.com/user-attachments/assets/839ea791-ead5-40a9-ac9d-189ca40ea9d8" />

Aksesibilitas Tombol: Tombol "Tambah Data", "Ubah", dan "Hapus" hanya muncul jika akun yang login memiliki role Admin.

<img width="1920" height="1080" alt="Screenshot (1131)" src="https://github.com/user-attachments/assets/1f5fbefe-1bfe-4ee9-a14e-150d341072a8" />

3. Halaman Detail Data

Fungsi: Menampilkan informasi lengkap dari salah satu item katalog yang diklik.

Tampilan: Gambar ditampilkan dalam ukuran besar, diikuti oleh Judul lengkap dan seluruh isi Keterangan.

Navigasi: Terdapat tombol "Kembali" yang mengarahkan user kembali ke posisi halaman katalog sebelumnya.

<img width="1920" height="1080" alt="Screenshot (1130)" src="https://github.com/user-attachments/assets/02fc5123-8149-42d4-857c-f6fa03d9b8f0" />

4. Halaman Operasi CRUD (Hanya Admin)

Tambah Data: Form input untuk mengunggah gambar baru, mengisi judul, dan deskripsi.

<img width="1920" height="1080" alt="Screenshot (1132)" src="https://github.com/user-attachments/assets/ab6a5417-56a4-4b1c-8ce4-0e508e916be2" />

Ubah Data: Form yang secara otomatis terisi (auto-fill) dengan data lama. Admin dapat mengganti teks atau memperbarui gambar jika diperlukan.

<img width="1920" height="1080" alt="Screenshot (1136)" src="https://github.com/user-attachments/assets/e87c3f56-b3d1-4cf3-959f-7ef26e410984" />

Hapus Data: Fitur konfirmasi sebelum menghapus data. Saat data dihapus, file gambar terkait di folder uploads juga akan ikut terhapus secara otomatis untuk menghemat ruang penyimpanan.

<img width="1920" height="1080" alt="Screenshot (1134)" src="https://github.com/user-attachments/assets/be8db013-5af0-4cb4-a119-a76a295d0187" />

5. Routing App (.htaccess)

Fungsi: Membuat URL menjadi lebih bersih dan profesional (SEO Friendly).

Cara Kerja: Menghilangkan ekstensi .php dari URL. Misalnya, akses halaman cukup melalui localhost/home atau localhost/detail/1 alih-alih memanggil file fisik secara langsung.
