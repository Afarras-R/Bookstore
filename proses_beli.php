<?php
session_start();
include 'config.php';

// Ambil data dari form
$email = $_POST['email'];
$password = $_POST['password'];
$judul = $_POST['judulBuku'];
$harga = $_POST['harga'];
$uang = $_POST['uang'];

// Validasi uang
if ($uang < $harga) {
    echo "<script>alert('Uang Anda kurang!'); window.history.back();</script>";
    exit;
}

$kembalian = $uang - $harga;

// Simpan ke tabel riwayat
$query = "INSERT INTO riwayat (email, judulBuku, harga, uang, kembalian, tanggal)
          VALUES ('$email', '$judul', '$harga', '$uang', '$kembalian', NOW())";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Pembelian berhasil!'); window.location='riwayat_pembelian.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
