<?php
  require __DIR__.'/config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- after -->
    <link rel="stylesheet" href="css/app.css">

  <title>Customers</title>
</head>
<body>
  <div class="container-scroller">

    <?php include __DIR__.'/partials/_navbar.php'; ?>

    <div class="container-fluid page-body-wrapper">

      <?php include __DIR__.'/partials/_sidebar.php'; ?>
      <?php include __DIR__.'/partials/_settings-panel.php'; ?>

      <div class="main-panel">
        <div class="content-wrapper">
        <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/logo.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN IN</a>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
        </div>

        <?php include __DIR__.'/partials/_footer.php'; ?>
      </div>
    </div>
  </div>

  <!-- scripts -->
    <!-- vendor.bundle.base.js includes jQuery, Popper and Bootstrap JS -->
    <script src="vendors/js/vendor.bundle.base.js"></script>

    <!-- Skydash off-canvas handlers (minimize & offcanvas) -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>

    <!-- Core template init (toggles sidebar classes, etc.) -->
    <script src="js/template.js"></script>

    <!-- (optional) settings panel, to-do list, etc. -->
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>

  <!-- etc… -->
</body>
</html>
