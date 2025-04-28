<?php
session_start();
require_once("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM pelanggan WHERE email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $row["password"])) {
            $_SESSION["email"] = $email;
            $_SESSION["nama"] = $row["nama"];
            $_SESSION["pelanggan_id"] = $row["pelanggan_id"];
            // Set notifikasi selamat datang
            $_SESSION['notification'] = [
                'type' => 'primary',
                'message' => 'Selamat Datang Kembali!'
            ];
            // Redirect ke dashboard
            header('Location: ../dashboard_user.php');
            exit();
        }   else {
            // Password salah
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'email atau Password salah'
            ];   
        }
    }
    // Redirect kembali ke halaman login jika gagal
    header('Location: login.php');
    exit();
}
$conn->close();
?>