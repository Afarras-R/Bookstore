<?php
// Menyisipkan file konfigurasi database
include 'config.php';

// Menyisipkan file header
include '.includes/header.php';

// Mengambil ID buku dari parameter URL
$id = $_GET['id'];

// Query untuk mengambil data buku berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM buku WHERE buku_id = $id");

// Mengambil hasil query sebagai array asosiatif
$data = mysqli_fetch_assoc($query);
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Judul halaman -->
    <h4 class="fw-bold">Edit Buku</h4>

    <div class="card">
        <div class="card-body">
            <!-- Form untuk mengupdate data buku -->
            <form action="proses_book.php" method="POST" enctype="multipart/form-data">
                <!-- Input tersembunyi untuk mengirim ID buku -->
                <input type="hidden" name="id" value="<?= $data['buku_id'] ?>">

                <!-- Input untuk Penulis -->
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" class="form-control" name="penulis" value="<?= $data['penulis'] ?>" required>
                </div>

                <!-- Input untuk Judul Buku -->
                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" name="judulBuku" value="<?= $data['judulBuku'] ?>" required>
                </div>

                <!-- Input untuk Unggah Gambar Baru -->
                <div class="mb-3">
                    <label class="form-label">Unggah Gambar</label>
                    <input class="form-control" type="file" name="image" accept="image/*">
                </div>

                <!-- Input untuk Harga Buku -->
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" value="<?= $data['harga'] ?>" required>
                </div>

                <!-- Textarea untuk Sinopsis Buku -->
                <div class="mb-3">
                    <label class="form-label">Sinopsis</label>
                    <textarea class="form-control" name="sinopsis" required><?= $data['sinopsis'] ?></textarea>
                </div>

                <!-- Tombol submit untuk update buku -->
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<!-- Menyisipkan file footer -->
<?php include '.includes/footer.php'; ?>
