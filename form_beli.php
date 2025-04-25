<?php
include 'config.php';
include '.includes/header.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM buku WHERE buku_id = $id");
$buku = mysqli_fetch_assoc($query);

if (!$buku) {
    echo "Data buku tidak tersedia.";
    exit;
}
?>

<title>Form Beli Buku</title>
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Judul Halaman -->
    <div class="row">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Pembelian Buku</h5>
                        <small class="text-muted float-end">Form Pembelian Buku</small>
                    </div>
                    <div class="card-body">
                        <form action="proses_beli.php" method="POST">
                            <input type="hidden" name="buku_id" value="<?= $buku['buku_id'] ?>">
                            <input type="hidden" name="judulBuku" value="<?= htmlspecialchars($buku['judulBuku']) ?>">
                            <input type="hidden" name="harga" value="<?= $buku['harga'] ?>">

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Judul Buku</label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($buku['judulBuku']) ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="uang" class="form-label">Masukkan Uang Anda</label>
                                <input type="number" class="form-control" id="uang" name="uang" required>
                            </div>

                            <button type="submit" name="bayar" class="btn btn-primary">Bayar</button>
                        </form>
                    </div>
                </div>
            </div>

<?php include '.includes/footer.php'; ?>