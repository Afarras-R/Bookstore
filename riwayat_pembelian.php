<?php

include '.includes/header.php';
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Riwayat Pembelian</h4>

    <?php if (!isset($_SESSION['riwayat_pembelian']) || empty($_SESSION['riwayat_pembelian'])): ?>
        <div class="alert alert-info">Belum ada pembelian yang dilakukan.</div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($_SESSION['riwayat_pembelian'] as $beli): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($beli['judulBuku']) ?></h5>
                            <p class="card-text">Dibeli oleh: <?= htmlspecialchars($beli['email']) ?></p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Tanggal: <?= $beli['tanggal'] ?></li>
                                <li class="list-group-item">Harga: Rp <?= number_format($beli['harga']) ?></li>
                                <li class="list-group-item">Dibayar: Rp <?= number_format($beli['uang']) ?></li>
                                <li class="list-group-item">Kembalian: Rp <?= number_format($beli['kembalian']) ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include '.includes/footer.php'; ?>
