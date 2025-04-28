<?php
include 'config.php';

$buku = $_GET['id'];
mysqli_query($conn, "DELETE FROM riwayat WHERE id=$buku");

header("Location: riwayat_pembelian.php");
?>