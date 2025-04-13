<?php
include(".includes/header.php");
$title = "formBeli";

?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Judul Halaman -->
  <div class="row"></div>
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Beli Buku</h5>
          <small class="text-muted float-end">Form Pembelian Buku</small>
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
              <label for="formFile" class="form-label">Unggah Gambar</label>
              <input class="form-control" type="file" name="image" accept="image/*" />
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
                  name="harga" />
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
            <di>
              <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
              <a href="dashboard.php" class="btn btn-danger">Kembali</a>
            </di>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include '.includes/footer.php';
?>