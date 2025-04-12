<?php
include(".includes/header.php");
$title = "Dashboard";
// Menyertakan file untuk menampilkan notifikasi (jika ada)
include '.includes/toast_notification.php';
?>
<div class="container-xxl flex-grow-1 container-p-y" id="container">
    <!-- Card untuk menampilkan tabel postingan -->
    <div class="row mb-5">
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="assets/img/illustrations/girl-doing-yoga-light.png" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">Buku Epep</h5>
                    <p class="card-text">Sinopsis</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"></li>
                    <li class="list-group-item">Penulis</li>
                    <li class="list-group-item">Harga</li>
                    <li class="list-group-item"></li>
                </ul>
                <div class="card-body">
                    <a href="form_beli.php" class="btn btn-outline-primary">Beli Buku</a>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" style="float: right;">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="assets/img/illustrations/girl-doing-yoga-light.png" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">Negeri Para Bedebah</h5>
                    <p class="card-text">Sinopsis</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"></li>
                    <li class="list-group-item">Penulis</li>
                    <li class="list-group-item">Harga</li>
                    <li class="list-group-item"></li>
                </ul>
                <div class="card-body">
                    <a href="form_beli.php" class="btn btn-outline-primary">Beli Buku</a>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" style="float: right;">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '.includes/footer.php';
?>