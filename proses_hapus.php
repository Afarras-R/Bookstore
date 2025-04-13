<?php
include 'config.php';

$buku = $_GET['id'];
mysqli_query($conn, "DELETE FROM buku WHERE buku_id=$buku");

header("Location: dashboard.php");
?>
