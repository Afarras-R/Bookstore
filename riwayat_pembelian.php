<?php
include '.includes/header_user.php';
include 'config.php'; // pastikan koneksi database

// Ambil data riwayat dari database
$riwayat_query = mysqli_query($conn, "SELECT * FROM riwayat ORDER BY tanggal DESC");
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Riwayat Pembelian</h4>

    <?php if (mysqli_num_rows($riwayat_query) === 0): ?>
        <div class="alert alert-info">Belum ada pembelian yang dilakukan</div>
    <?php else: ?>
        <div class="row">
            <?php while ($beli = mysqli_fetch_assoc($riwayat_query)): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($beli['judulBuku']) ?></h5>
                            <p class="card-text">Dibeli oleh: <?= htmlspecialchars($beli['email']) ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Tanggal: <?= $beli['tanggal'] ?></li>
                            <li class="list-group-item">Harga: Rp <?= number_format($beli['harga']) ?></li>
                            <li class="list-group-item">Dibayar: Rp <?= number_format($beli['uang']) ?></li>
                            <li class="list-group-item">Kembalian: Rp <?= number_format($beli['kembalian']) ?></li>
                        </ul>
                        <br>
                        <li class="list-group-item">
                            <a class="btn btn-danger" href="proses_hapus.php?id=<?= $beli['id'] ?>" onclick="return confirm('Yakin ingin menghapus riwayat ini?')">Hapus</a>
                        </li>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>

<?php include '.includes/footer.php'; ?>