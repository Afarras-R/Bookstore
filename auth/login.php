<!--Selesai-->

<?php include(".layouts/header.php"); ?>
<!-- Register Section -->
<div class="card">
  <div class="card-body">
    <!-- Logo Section -->
    <div class="app-brand justify-content-center">
      <a href="index.html" class="app-brand-link gap-2">
        <span class="app-brand-text demo text-uppercase fw-bolder">Bookstore</span>
      </a>
    </div>
    <!-- /Logo Section -->

    <!-- Heading -->
    <h4 class="mb-2">Selamat Datang di Bookstore!</h4>
    
    <!-- Login Form -->
    <form class="mb-3" action="login_auth.php" method="POST">
      <!-- Email Input Field -->
      <div class="mb-3">
        <label class="form-label">Masukan Email</label>
        <input type="text" class="form-control" name="email"
          placeholder="Masukan Nama/Email" autofocus required />
      </div>
      
      <!-- Password Input Field -->
      <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
          <label class="form-label" for="password">Kata Sandi</label>
        </div>
        <div class="input-group input-group-merge">
          <input type="password" class="form-control" name="password"
            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
            aria-describedby="password" />
          <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
      </div>
      
      <!-- Submit Button -->
      <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
      </div>
    </form>

    <!-- Sign-up Link -->
    <p class="text-center">
      <span>Belum punya akun?</span><a href="register.php"><span> Daftar</span></a>
    </p>
  </div>
</div>
<!-- /Register Section -->

<?php include(".layouts/footer.php"); ?>