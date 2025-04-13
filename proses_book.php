<?php
include 'config.php'; // koneksi ke database

if (isset($_POST['tambah'])) {
    $penulis  = $_POST['penulis'];
    $judulbuku    = $_POST['judulBuku'];
    $harga    = $_POST['harga'];
    $sinopsis = $_POST['sinopsis'];

    // Upload Gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];
    $folder = "assets/img/uploads/" . $gambar;

    if (move_uploaded_file($tmp, $folder)) {
        $sql = "INSERT INTO buku (penulis, judulBuku, harga, sinopsis, gambar) 
                VALUES ('$penulis', '$judulBuku', '$harga', '$sinopsis', '$gambar')";

        if (mysqli_query($conn, $sql)) {
            header("Location: dashboard.php?status=success");
            exit();
        } else {
            echo "Gagal menambahkan buku: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal mengupload gambar.";
    }
} else {
    echo "Form belum disubmit.";
}
?>
