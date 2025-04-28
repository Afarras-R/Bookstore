<!--Selesai-->

<?php
session_start(); // Memulai session PHP
require_once("../config.php"); // Memasukkan file konfigurasi database

// Mengecek jika request method adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form login
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query untuk mencari user berdasarkan email
    $sql = "SELECT * FROM pelanggan WHERE email='$email'";
    $result = $conn->query($sql);
    
    // Jika user ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifikasi password yang diinput dengan password yang ada di database
        if (password_verify($password, $row["password"])) {
            // Jika password benar, set session user
            $_SESSION["email"] = $email;
            $_SESSION["nama"] = $row["nama"];
            $_SESSION["pelanggan_id"] = $row["pelanggan_id"];

            // Set notifikasi berhasil login
            $_SESSION['notification'] = [
                'type' => 'primary',
                'message' => 'Selamat Datang Kembali!'
            ];

            // Redirect ke halaman dashboard user
            header('Location: ../dashboard_user.php');
            exit();
        } else {
            // Jika password salah, buat notifikasi gagal
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Email atau Password salah'
            ];
        }
    }

    // Jika email tidak ditemukan atau password salah, redirect ke halaman login
    header('Location: login.php');
    exit();
}

// Menutup koneksi database
$conn->close();
?>