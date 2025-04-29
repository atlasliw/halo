<?php
// subscriptions.php
session_start();
require __DIR__ . '/config/database.php';

// redirect if not logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}

// fetch subscriptions (dropping the product_pricing join so we see all rows)
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
    CONCAT(FORMAT(s.cost,2), ' MYR')      AS cost,
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
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>All Subscriptions</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap & Theme CSS -->
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <div class="container-scroller">

    <?php include __DIR__ . '/partials/_navbar.php'; ?>

    <div class="container-fluid page-body-wrapper">
      <?php include __DIR__ . '/partials/_sidebar.php'; ?>
      <?php include __DIR__ . '/partials/_settings-panel.php'; ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <h4 class="mb-4">All Subscriptions</h4>

          <div class="table-responsive">
            <table id="subscriptionsTable" class="table table-striped table-bordered" style="width:100%">
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

        </div><!-- content-wrapper -->

        <?php include __DIR__ . '/partials/_footer.php'; ?>
      </div><!-- main-panel -->
    </div><!-- page-body-wrapper -->
  </div><!-- container-scroller -->

  <!-- vendor.bundle.base.js includes jQuery, Popper & Bootstrap JS -->
  <script src="vendors/js/vendor.bundle.base.js"></script>

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

  <!-- theme scripts -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>

  <script>
    $(document).ready(function() {
      $('#subscriptionsTable').DataTable({
        paging:       true,
        searching:    true,
        ordering:     true,
        info:         true,
        responsive:   true,
        order:        [[0, 'desc']],
        lengthMenu:   [[10, 25, 50, -1], [10, 25, 50, 'All']]
      });
    });
  </script>
</body>
</html>
