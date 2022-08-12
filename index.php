<?php
session_start();

if (isset($_SESSION['login'])) {
  header("Location: view_admin/dashboard.php");
  exit;
}

include "templates/auth_header.php";
?>
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="index.php" class="app-brand-link gap-2">
              <img src="assets/img/logo.png" class="app-brand-logo demo" width="25">
              <span class="app-brand-text demo text-body fw-bolder">TOKO KIKI</span>
            </a>
          </div>
          <!-- /Logo -->
          <h5 class="mb-4 text-center">SISTEM INFORMASI INPUT GAJI</h5>

          <?php if (isset($_GET["pesan"])) : ?>
            <p class="alert alert-danger"><?= $_GET["pesan"]; ?></p>
          <?php endif; ?>

          <form id="formAuthentication" class="mb-3" action="check_login.php" method="POST">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" autofocus />
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-4">
              <button class="btn btn-primary d-grid w-100" type="submit">
                Sign in
              </button>
            </div>
          </form>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>

<?php
include "templates/auth_footer.php";
?>