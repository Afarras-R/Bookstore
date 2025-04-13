<?php
include ("config.php");
include (".includes/header.php");
$title = "Dashboard";
include '.includes/toast_notification.php';
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <?php
        $query = "SELECT * FROM buku ORDER BY buku_id DESC";
        $result = mysqli_query($conn, $query);

        while ($buku = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="assets/img/uploads/<?php echo $buku['gambar']; ?>" alt="Gambar Buku" />
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($buku['judulBuku']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($buku['sinopsis']); ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo htmlspecialchars($buku['penulis']); ?></li>
                        <li class="list-group-item">Rp<?php echo number_format($buku['harga'], 0, ',', '.'); ?></li>
                    </ul>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Beli</button>
                    </div>
                    <div class="dropdown position-absolute bottom-0 end-0 m-2">
                        <button  class="btn btn-sm btn-icon btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="edit_book.php?id=<?php echo $buku['buku_id']; ?>">Edit</a></li>
                            <li>
                                <a class="dropdown-item text-danger" href="proses_hapus.php?id=<?php echo $buku['buku_id']; ?>"
                                onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include '.includes/footer.php'; ?>
