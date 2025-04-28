<?php
session_start();

$pelangganId = $_SESSION["pelanggan_id"];
$nama = $_SESSION["nama"];
$email = $_SESSION["email"];
// Ambil notifikasi jika ada, kemudian hapus dari sesi
$notification = $_SESSION['notification'] ?? null;
if ($notification) {
    unset($_SESSION['notification']);
}

/* Periksa apakah sesi username dan role sudah ada,
jika tidak maka arahkan ke halaman login */
if (empty($_SESSION["nama"]) || empty($_SESSION["email"])) {
    $_SESSION['notification'] = [
        'type' => 'danger',
        'message' => 'Silahkan Login Terlebih Dahulu!'
    ];
    header('Location: ./auth/login.php');
    exit(); // Pastikan script berhenti setelah pengalihan
} 

?>