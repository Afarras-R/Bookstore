<!--Selesai-->

<?php
// Menentukan konfigurasi koneksi database
$host = "localhost";      // Host database
$username = "root";       // Username database
$password = "";           // Password database
$database = "bookstore";  // Nama database yang akan digunakan

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Mengecek apakah koneksi berhasil atau tidak
if ($conn->connect_error) {
    // Jika koneksi gagal, hentikan eksekusi dan tampilkan pesan error
    die("Database gagal terkoneksi: " . $conn->connect_error);
}
?>
