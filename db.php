<?php
// customers.php

// 1) enable errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2) include DB connection
require __DIR__ . '/database.php';

// 3) fetch data
try {
    $stmt = $pdo->query('SELECT * FROM customers ORDER BY id');
    $customers = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Customers List</title>
  <!-- DataTables CSS -->
  <link
    rel="stylesheet"
    href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"
  >
  <link
    rel="stylesheet"
    href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css"
  >
  <style>
    body { padding: 2em; font-family: sans-serif; }
  </style>
</head>
<body>
  <h1>Customer Details</h1>
  <table id="customersTable" class="table table-striped" style="width:100%">
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

  <!-- jQuery & DataTables JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script
    src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js">
  </script>
  <script>
    $(document).ready(function() {
      $('#customersTable').DataTable({
        pageLength: 25,
        ordering: true,
        searching: true
      });
    });
  </script>
</body>
</html>
