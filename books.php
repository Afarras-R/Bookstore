<?php
// Menyertakan header halaman
include '.includes/header.php';
include '.includes/toast_notification.php';
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Judul Halaman -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambahkan Buku</h5>
                    <small class="text-muted float-end fw-bolder text-uppercase">Form Tambah Buku</small>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Judul Buku</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Penulis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="Petualangan Mesir" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Genre</label>
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="basic-default-name"
                                    placeholder="Action, Adventure" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea
                                    id="basic-default-message"
                                    class="form-control"
                                    placeholder="Tambahkan deskripsi buku"
                                    aria-label="Tambahkan deskripsi buku"
                                    aria-describedby="basic-icon-default-message2"></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn rounded-pill btn-outline-info">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
<?php include '.includes/footer.php'; ?>