<?php
// Menyertakan header halaman
include '.includes/header.php';
include '.includes/toast_notification.php';
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Judul Halaman -->
    <div class="row">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambahkan Buku</h5>
                        <small class="text-muted float-end">Form Tambah Buku</small>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Penulis</label>
                                <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" name="penulis" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Judul Buku</label>
                                <input type="text" class="form-control" id="basic-default-name" placeholder="Petualangan Azril" name="judulBuku" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-name">Harga</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">Rp</span>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="100"
                                        aria-label="Amount (in Rupiah)" 
                                        name="harga"/>
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Sinopsis</label>
                                <textarea
                                    id="basic-default-message"
                                    class="form-control"
                                    placeholder="Tulis sipnosis buku!" 
                                    name="sinopsis"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>


            <?php include '.includes/footer.php'; ?>