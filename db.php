<?php
// customers.php

// (Optional) Show errors for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 1) Database connection parameters
$host    = 'localhost';
$db      = 'u737908269_halo';
$user    = 'u737908269_atlas';
$pass    = '$1Rv1r@dmIn';
$charset = 'utf8mb4';

// 2) Set up DSN and PDO options
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    // 3) Create PDO instance
    $pdo = new PDO($dsn, $user, $pass, $options);

    // 4) Fetch all customers
    $stmt = $pdo->query('SELECT * FROM customers ORDER BY id');
    $customers = $stmt->fetchAll();
} catch (\PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Customer Details</title>
  <!-- Bootstrap CSS (optional but useful) -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="mb-4">Customer Details</h1>
    <table id="customersTable" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <?php if (!empty($customers)): ?>
            <?php foreach (array_keys($customers[0]) as $col): ?>
              <th><?= htmlspecialchars($col) ?></th>
            <?php endforeach; ?>
          <?php endif; ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($customers as $row): ?>
          <tr>
            <?php foreach ($row as $cell): ?>
              <td><?= htmlspecialchars($cell) ?></td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- jQuery & Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#customersTable').DataTable({
        pageLength: 25,
        ordering:    true,
        searching:   true
      });
    });
  </script>
</body>
</html>
