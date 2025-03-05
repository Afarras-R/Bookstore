<?php
require_once("../config.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $nama = $_POST["nama"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 

    $sql = "INSERT INTO pelanggan (nama, email)
    VALUES ('$email', '$nama', '$hashedPassword')";
    if ($conn->query($sql) === TRUE) {
        // Simpan notifikasi ke dalam session
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Registrasi Berhasil!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal Registrasi: ' . mysqli_error($conn)
        ];
    }
    header('Location: login.php');
    exit();
}

$conn->close();
?>