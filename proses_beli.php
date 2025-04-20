<?php

if (isset($_POST['bayar'])) {
    $judul = $_POST['judulBuku'];
    $harga = (int) $_POST['harga'];
    $uang = (int) $_POST['uang'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi uang
    if ($uang < $harga) {
        echo "<script>alert('Uang anda kurang. Silakan masukkan jumlah yang cukup.'); window.history.back();</script>";
        exit;
    }

    $kembalian = $uang - $harga;

    // Simpan ke riwayat (session)
    if (!isset($_SESSION['riwayat_pembelian'])) {
        $_SESSION['riwayat_pembelian'] = [];
    }

    $_SESSION['riwayat_pembelian'][] = [
        'judulBuku' => $judul,
        'email' => $email,
        'tanggal' => date('Y-m-d H:i:s'),
        'harga' => $harga,
        'uang' => $uang,
        'kembalian' => $kembalian,
        'gambar' => $gambar,
    ];

    echo "<script>alert('Pembelian berhasil! Kembalian Anda: Rp {$kembalian}'); window.location.href = 'riwayat_pembelian.php';</script>";
    exit;

} else {
    echo "<script>alert('Akses tidak sah.'); window.location.href = 'index.php';</script>";
    exit;
}
?>
