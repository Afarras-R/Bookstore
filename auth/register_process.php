<?php
require_once("../config.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
    $nama = isset($_POST["nama"]) ? trim($_POST["nama"]) : null;
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;
    
    // Validasi input tidak boleh kosong
    if (empty($email) || empty($nama) || empty($password)) {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Semua kolom harus diisi!'
        ];
        header("Location: register.php");
        exit();
    }
    
    // Hash password sebelum disimpan ke database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Gunakan tabel pelanggan sesuai database yang ada
    $sql = "INSERT INTO pelanggan (email, nama, password) VALUES (?, ?, ?)";
    
    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $nama, $hashedPassword);
    
    if ($stmt->execute()) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Registrasi Berhasil!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal Registrasi: ' . $stmt->error
        ];
    }
    
    $stmt->close();
    header("Location: login.php");
    exit();
}

$conn->close();
?>