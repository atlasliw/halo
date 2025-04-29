<?php
// subscription.php
  // Include the database connection file
  require __DIR__.'/config/database.php';

  // Check if the user is logged in
  session_start();
  if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
  }

  // Fetch subscriptions with all FK lookups
    $sql = "
    SELECT
      s.id,
      c.company_name   AS customer,
      p.name           AS product,
      s.license_key,
      sts.name         AS status,
      lt.name          AS license_type,
      DATE_FORMAT(s.start_date, '%Y-%m-%d') AS start_date,
      IFNULL(DATE_FORMAT(s.renewal_date, '%Y-%m-%d'), '-') AS renewal_date,
      IFNULL(DATE_FORMAT(s.expiration_date, '%Y-%m-%d'), '-') AS expiration_date,
      IF(s.auto_renew, 'Yes', 'No') AS auto_renew,
      CONCAT(FORMAT(s.cost,2),' MYR')   AS cost,
      u.username       AS requested_by,
      DATE_FORMAT(s.created_at, '%Y-%m-%d %H:%i:%s') AS created_at,
      DATE_FORMAT(s.updated_at, '%Y-%m-%d %H:%i:%s') AS updated_at
    FROM subscriptions s
    JOIN customers              c   ON s.customer_id = c.id
    JOIN products               p   ON s.product_id  = p.id
    JOIN subscription_statuses  sts ON s.status_id   = sts.id
    JOIN license_types          lt  ON s.type_id     = lt.id
    JOIN users                  u   ON s.requested_by_user_id = u.id
    ORDER BY s.id DESC
  ";



  // Fetch the subscription data from the database
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
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
          <h4 class="mb-4">All Subscriptions</h4>
            <div class="table-responsive">
              <table id="subscriptionsTable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>License Key</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Start Date</th>
                    <th>Renewal Date</th>
                    <th>Expires</th>
                    <th>Auto-Renew</th>
                    <th>Cost</th>
                    <th>Requested By</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($rows as $r): ?>
                    <tr>
                      <td><?= htmlspecialchars($r['id']) ?></td>
                      <td><?= htmlspecialchars($r['customer']) ?></td>
                      <td><?= htmlspecialchars($r['product']) ?></td>
                      <td><?= htmlspecialchars($r['license_key']) ?></td>
                      <td><?= htmlspecialchars($r['status']) ?></td>
                      <td><?= htmlspecialchars($r['license_type']) ?></td>
                      <td><?= $r['start_date'] ?></td>
                      <td><?= $r['renewal_date'] ?></td>
                      <td><?= $r['expiration_date'] ?></td>
                      <td><?= $r['auto_renew'] ?></td>
                      <td><?= $r['cost'] ?></td>
                      <td><?= htmlspecialchars($r['requested_by']) ?></td>
                      <td><?= $r['created_at'] ?></td>
                      <td><?= $r['updated_at'] ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
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
