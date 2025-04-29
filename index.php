<?php

// Start the session
session_start();
if (! isset($_SESSION['user_id']) ) {
    header('Location: login.php');
    exit;
}

// Include the database connection file
// This file should contain the database connection logic
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
          <!-- your customer table here -->
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
