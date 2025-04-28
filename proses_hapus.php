<!-- Selesai -->

<?php
// Menghubungkan ke database
include 'config.php';

// Mengambil ID buku dari parameter URL
$buku = $_GET['id'];

// Menghapus data buku berdasarkan ID
mysqli_query($conn, "DELETE FROM buku WHERE buku_id=$buku");

// Setelah penghapusan, redirect ke halaman dashboard
header("Location: dashboard.php");
?>