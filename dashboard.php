<?php
include ("./includes/header.php");
$title = "Dashboard";
// Menyertakan file untuk menampilkan notifikasi (jika ada)
include './includes/toast_notification.php';
?>
<div class="container-xxl flex-grow=1 container-p-y">
    <!-- Card untuk menampilkan tabel buku -->
    <div class="card">
        <!-- Tabel dengan baris yang dapat di-hover -->
        <div class="card">
            <!-- Header Tabel -->
             <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Semua Buku</h4>
             </div>
             <div class="card-body">
                <!-- Tabel responsif -->
                 <div class="table-responsive text-nowrap">
                    <table id="datatable" class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th width="50px">#</th>
                                <th>Judul Buku</th>
                                <th>Penulis</th>
                                <th width="150px">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <!-- Menampilkan data dari tabel database -->
                            <?php
                                $index = 1; // Variabel untuk nomor urut
                                /* Query untuk mengambil data dari tabel buku */
                                $query = "SELECT * FROM buku";
                                // Eksekusi query
                                $exec = mysqli_query($conn, $query);

                                // Perulangan untuk menampilkan setiap baris hasil query
                                while ($buku = mysqli_fetch_assoc($exec)) :
                            ?>
                            <tr>
                                <td><?= $index++; ?></td>
                                <td><?= htmlspecialchars($buku['judul']); ?></td>
                                <td><?= htmlspecialchars($buku['penulis']); ?></td>
                                <td>
                                    <div class="dropdown">
                                        <!-- Tombol dropdown untuk Pilihan -->
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <!-- Menu dropdown -->
                                        <div class="dropdown-menu">
                                            <!-- Pilihan Edit -->
                                            <a href="edit_buku.php?id=<?= $buku['id_buku']; ?>" class="dropdown-item">
                                                <i class="bx bx-edit-alt me-2"></i> Edit
                                            </a>
                                            <!-- Pilihan Delete -->
                                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteBuku_<?= $buku['id_buku']; ?>">
                                                <i class="bx bx-trash me-2"></i> Hapus
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal untuk Hapus Buku -->
                            <div class="modal fade" id="deleteBuku_<?= $buku['id_buku']; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Buku?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="proses_buku.php" method="POST">
                                                <div>
                                                    <p>Tindakan ini tidak bisa dibatalkan.</p>
                                                    <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" name="delete" class="btn btn-primary">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                 </div>
             </div>
        </div>
        <!-- Akhir tabel dengan baris yang dapat di-hover -->
    </div>
</div>

<?php
include ("./includes/footer.php");
?>
