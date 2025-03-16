<?php
require_once("../config.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;

    // Validasi input tidak boleh kosong
    if (empty($email) || empty($password)) {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Email dan password harus diisi!'
        ];
        header("Location: login.php");
        exit();
    }

    // Ambil data pengguna dari database berdasarkan email
    $sql = "SELECT * FROM pelanggan WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Cek apakah pengguna ditemukan dan password sesuai
    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["pelanggan_id"] = $user["pelanggan_id"];
        $_SESSION["user_name"] = $user["nama"];
        $_SESSION["notification"] = [
            'type' => 'success',
            'message' => 'Login berhasil! Selamat datang, ' . $user["nama"]
        ];
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Email atau password salah!'
        ];
        header("Location: login.php");
        exit();
    }
}

$conn->close();
?>
