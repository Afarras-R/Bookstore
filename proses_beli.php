<!-- Selesai -->

<?php
session_start(); // Memulai session
include 'config.php'; // Menghubungkan ke database

// Mengambil data yang dikirimkan dari form pembelian
$email = $_POST['email'];
$password = $_POST['password'];
$judul = $_POST['judulBuku'];
$harga = $_POST['harga'];
$uang = $_POST['uang'];

// Validasi: cek apakah uang cukup untuk membeli
if ($uang < $harga) {
    // Jika uang kurang, tampilkan alert dan kembali ke halaman sebelumnya
    echo "<script>alert('Uang Anda kurang!'); window.history.back();</script>";
    exit;
}

// Hitung kembalian
$kembalian = $uang - $harga;

// Simpan data pembelian ke tabel riwayat
$query = "INSERT INTO riwayat (email, judulBuku, harga, uang, kembalian, tanggal)
          VALUES ('$email', '$judul', '$harga', '$uang', '$kembalian', NOW())";

// Jika query berhasil dijalankan
if (mysqli_query($conn, $query)) {
    // Tampilkan alert sukses dan arahkan ke halaman riwayat pembelian
    echo "<script>alert('Pembelian berhasil!'); window.location='riwayat_pembelian.php';</script>";
} else {
    // Jika gagal, tampilkan pesan error
    echo "Error: " . mysqli_error($conn);
}
?>
