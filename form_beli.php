<!-- Selesai -->

<?php
// Menyisipkan file konfigurasi database
include 'config.php';

// Menyisipkan file header
include '.includes/header.php';

// Mengambil ID buku dari parameter URL
$id = $_GET['id'];

// Query untuk mengambil data buku berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM buku WHERE buku_id = $id");

// Menyimpan hasil query ke dalam array asosiatif
$buku = mysqli_fetch_assoc($query);

// Cek jika data buku tidak ditemukan
if (!$buku) {
    echo "Data buku tidak tersedia.";
    exit; // Menghentikan eksekusi script jika data tidak ada
}
?>

<!-- Judul Halaman -->
<title>Form Beli Buku</title>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <!-- Judul form dan deskripsi -->
                        <h5 class="mb-0">Pembelian Buku</h5>
                        <small class="text-muted float-end">Form Pembelian Buku</small>
                    </div>
                    <div class="card-body">
                        <!-- Form untuk proses pembelian buku -->
                        <form action="proses_beli.php" method="POST">
                            <!-- Menyimpan ID, judul, dan harga buku dalam input tersembunyi -->
                            <input type="hidden" name="buku_id" value="<?= $buku['buku_id'] ?>">
                            <input type="hidden" name="judulBuku" value="<?= htmlspecialchars($buku['judulBuku']) ?>">
                            <input type="hidden" name="harga" value="<?= $buku['harga'] ?>">

                            <!-- Input Email Pembeli -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <!-- Input Password Pembeli -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <!-- Menampilkan Judul Buku (readonly) -->
                            <div class="mb-3">
                                <label class="form-label">Judul Buku</label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($buku['judulBuku']) ?>" readonly>
                            </div>

                            <!-- Input Uang Pembeli -->
                            <div class="mb-3">
                                <label for="uang" class="form-label">Masukkan Uang Anda</label>
                                <input type="number" class="form-control" id="uang" name="uang" required>
                            </div>

                            <!-- Tombol untuk submit pembayaran -->
                            <button type="submit" name="bayar" class="btn btn-primary">Bayar</button>
                        </form>
                    </div>
                </div>
            </div>

<!-- Menyisipkan file footer -->
<?php include '.includes/footer.php'; ?> 
