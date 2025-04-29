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

      <div class="main-panel">
        <div class="content-wrapper">
          <!-- your customer table here -->
        </div>

        <?php include __DIR__.'/partials/_footer.php'; ?>
      </div>
    </div>
  </div>

  <!-- scripts -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- etc… -->
</body>
</html>
