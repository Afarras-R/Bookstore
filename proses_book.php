<?php
include 'config.php'; // Menyertakan koneksi ke database

// Proses Tambah Buku
if (isset($_POST['tambah'])) {
    // Mengambil data dari form tambah
    $penulis  = $_POST['penulis'];
    $judul    = $_POST['judulBuku'];
    $harga    = $_POST['harga'];
    $sinopsis = $_POST['sinopsis'];

    // Menangani upload gambar
    $gambar = $_FILES['gambar']['name']; // Nama file
    $tmp    = $_FILES['gambar']['tmp_name']; // Lokasi sementara
    $folder = "assets/img/uploads/" . $gambar; // Lokasi tujuan

    // Upload file ke folder tujuan
    if (move_uploaded_file($tmp, $folder)) {
        // Menyusun query insert data ke tabel buku
        $sql = "INSERT INTO buku (penulis, judulBuku, harga, sinopsis, gambar) 
                VALUES ('$penulis', '$judul', '$harga', '$sinopsis', '$gambar')";

        // Eksekusi query
        if (mysqli_query($conn, $sql)) {
            // Redirect ke dashboard jika sukses
            header("Location: dashboard.php?status=success");
            exit();
        } else {
            // Tampilkan error jika query gagal
            echo "Gagal menambahkan buku: " . mysqli_error($conn);
        }
    } else {
        // Tampilkan error jika upload gambar gagal
        echo "Gagal mengupload gambar.";
    }

// Proses Edit / Update Buku
} elseif (isset($_POST['update'])) {
    // Mengambil data dari form edit
    $id       = $_POST['id'];
    $penulis  = $_POST['penulis'];
    $judul    = $_POST['judulBuku'];
    $harga    = $_POST['harga'];
    $sinopsis = $_POST['sinopsis'];

    // Mengecek apakah ada gambar baru yang diupload
    if (!empty($_FILES['image']['name'])) {
        $gambar = $_FILES['image']['name']; // Nama file baru
        $tmp    = $_FILES['image']['tmp_name']; // Lokasi sementara
        $path   = "assets/img/uploads/" . $gambar; // Lokasi tujuan upload gambar baru

        // Upload file gambar baru
        move_uploaded_file($tmp, $path);

        // Update data buku beserta gambar baru
        $query = "UPDATE buku SET penulis='$penulis', judulBuku='$judul', harga='$harga', sinopsis='$sinopsis', gambar='$gambar' WHERE buku_id=$id";
    } else {
        // Update data buku tanpa mengubah gambar
        $query = "UPDATE buku SET penulis='$penulis', judulBuku='$judul', harga='$harga', sinopsis='$sinopsis' WHERE buku_id=$id";
    }

    // Eksekusi query update
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect ke dashboard jika update sukses
        header("Location: dashboard.php?pesan=update-sukses");
    } else {
        // Tampilkan error jika query update gagal
        echo "Gagal mengupdate data.";
    }

// Jika tidak ada form yang disubmit
} else {
    echo "Akses tidak sah.";
}
?>
