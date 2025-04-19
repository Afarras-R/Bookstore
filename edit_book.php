<?php
include 'config.php';
include '.includes/header.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM buku WHERE buku_id = $id");
$data = mysqli_fetch_assoc($query);
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold">Edit Buku</h4>
    <div class="card">
        <div class="card-body">
            <form action="proses_book.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['buku_id'] ?>">

                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" class="form-control" name="penulis" value="<?= $data['penulis'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" name="judulBuku" value="<?= $data['judulBuku'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Unggah Gambar</label>
                    <input class="form-control" type="file" name="image" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" value="<?= $data['harga'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sinopsis</label>
                    <textarea class="form-control" name="sinopsis" required><?= $data['sinopsis'] ?></textarea>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<?php include '.includes/footer.php'; ?>

