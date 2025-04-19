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

<?php
include 'config.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $penulis = $_POST['penulis'];
    $judul = $_POST['judulBuku'];
    $harga = $_POST['harga'];
    $sinopsis = $_POST['sinopsis'];

    // Cek apakah gambar baru diunggah
    if (!empty($_FILES['image']['name'])) {
        $gambar = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $path = "assets/img/uploads/" . $gambar;
        move_uploaded_file($tmp, $path);

        // Update dengan gambar baru
        $query = "UPDATE buku SET penulis='$penulis', judulBuku='$judul', harga='$harga', sinopsis='$sinopsis', gambar='$gambar' WHERE buku_id=$id";
    } else {
        // Update tanpa ganti gambar
        $query = "UPDATE buku SET penulis='$penulis', judulBuku='$judul', harga='$harga', sinopsis='$sinopsis' WHERE buku_id=$id";
    }

    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: dashboard.php?pesan=update-sukses");
    } else {
        echo "Gagal mengupdate data.";
    }
} else {
    echo "Akses tidak sah.";
}
?>

