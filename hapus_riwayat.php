<!-- Selesai -->

<?php
// Menyisipkan file konfigurasi database
include 'config.php';

// Mengambil ID riwayat pembelian dari parameter URL
$buku = $_GET['id'];

// Menjalankan query untuk menghapus data riwayat pembelian berdasarkan ID
mysqli_query($conn, "DELETE FROM riwayat WHERE id=$buku");

// Setelah menghapus, arahkan (redirect) kembali ke halaman riwayat pembelian
header("Location: riwayat_pembelian.php");
?>