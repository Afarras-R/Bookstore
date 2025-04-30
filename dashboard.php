<?php
// Menghubungkan ke file konfigurasi database
include("config.php");

// Memasukkan header halaman
include(".includes/header.php");

// Menentukan judul halaman
$title = "Dashboard";

// Memasukkan file notifikasi toast
include('.includes/toast_notification.php');
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <?php
        // Query untuk mengambil semua data buku dari database
        $query = "SELECT * FROM buku ORDER BY buku_id DESC";
        $result = mysqli_query($conn, $query);

        // Looping untuk menampilkan setiap buku
        while ($buku = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm border-light rounded position-relative">
                    <!-- Menampilkan gambar buku -->
                    <img class="card-img-top"
                        src="assets/img/uploads/<?php echo $buku['gambar']; ?>"
                        alt="Gambar Buku"
                        style="height: 200px; width: 100%; object-fit: contain; background-color: #f5f5f5; padding: 5px;" />

                    <div class="card-body">
                        <!-- Menampilkan judul buku -->
                        <h5 class="card-title text-primary"><?php echo htmlspecialchars($buku['judulBuku']); ?></h5>

                        <!-- Menampilkan sinopsis buku -->
                        <p class="card-text text-muted"><?php echo htmlspecialchars($buku['sinopsis']); ?></p>
                    </div>

                    <!-- Menampilkan informasi penulis dan harga buku -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Penulis:</strong> <?php echo htmlspecialchars($buku['penulis']); ?></li>
                        <li class="list-group-item"><strong>Harga:</strong> Rp<?php echo number_format($buku['harga'], 0, ',', '.'); ?></li>
                    </ul>

                    <br>

                    <!-- Dropdown menu untuk Edit dan Hapus buku -->
                    <div class="dropdown position-absolute bottom-0 end-0 m-2">
                        <button class="btn btn-sm btn-icon btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="edit_book.php?id=<?php echo $buku['buku_id']; ?>">Edit Buku</a></li>
                            <li><a class="dropdown-item text-danger" href="proses_hapus.php?id=<?php echo $buku['buku_id']; ?>"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus Buku</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Menutup halaman dengan footer -->
<?php include('.includes/footer.php'); ?>