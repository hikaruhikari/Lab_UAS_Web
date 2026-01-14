<?php
// 1. Mulai Session untuk sistem login (Role Admin & User) 
session_start();

// 2. Import Database (OOP) & Konfigurasi 
require_once 'Konfigurasi/database.php';
$db = new Database();

// 3. Menangkap URL dari .htaccess (Routing) 
// Contoh: domain.com/detail/5 -> $url[0] = 'detail', $url[1] = '5'
$url_raw = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';
$url = explode('/', $url_raw);
$page = $url[0];

// 4. Daftar halaman yang bisa dibuka tanpa login
$halaman_publik = ['login', 'proses_login'];

// 5. Satpam Keamanan: Jika belum login, paksa ke halaman login 
if (!isset($_SESSION['user_id']) && !in_array($page, $halaman_publik)) {
    // Jika mencoba akses halaman internal tanpa login, arahkan ke login
    include "Sistem/Akun/login.php";
    exit();
}

// 6. Navigasi Halaman (Routing Logic) 
switch ($page) {
    case 'home':
        // Halaman utama: Menampilkan katalog, Filter, & Pagination [cite: 10]
        include "Halaman/home.php";
        break;

    case 'detail':
        // Halaman detail: Muncul saat gambar diklik
        $id_data = $url[1] ?? null;
        include "Halaman/detail.php";
        break;

    case 'tambah':
        // Proteksi Role: Hanya Admin yang bisa tambah 
        if ($_SESSION['role'] !== 'admin') {
            header("Location: home");
            exit();
        }
        include "Sistem/CRUD/tambah.php";
        break;

    case 'ubah':
        // Proteksi Role: Hanya Admin yang bisa ubah 
        if ($_SESSION['role'] !== 'admin') {
            header("Location: home");
            exit();
        }
        $id_data = $url[1] ?? null;
        include "Sistem/CRUD/ubah.php";
        break;

    case 'hapus':
        // Proteksi Role: Hanya Admin yang bisa hapus 
        if ($_SESSION['role'] !== 'admin') {
            header("Location: home");
            exit();
        }
        $id_data = $url[1] ?? null;
        include "Sistem/CRUD/hapus.php";
        break;

    case 'proses':
        // File pusat pengolahan logika CRUD [cite: 13]
        include "Sistem/CRUD/proses.php";
        break;

    case 'login':
        // Tampilan form login
        include "Sistem/Akun/login.php";
        break;

    case 'logout':
        // Sistem keluar akun
        include "Sistem/Akun/logout.php";
        break;

    default:
        // Jika halaman tidak ditemukan, balikkan ke home
        include "Halaman/home.php";
        break;
}