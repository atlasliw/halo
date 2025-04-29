<?php
// customers.php
require 'config/database.php';

// Fetch all customers
$stmt = $pdo->query('SELECT * FROM customers ORDER BY id');
$customers = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Customers List</title>
  <!-- DataTables CSS (CDN) -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <!-- Optional: Bootstrap 4 styling -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <div class="container">
    <h1>Customer Details</h1>
    <table id="customersTable" class="display" style="width:100%">
      <thead>
        <tr>
          <?php
            // Print column headers dynamically
            if (!empty($customers)) {
              foreach (array_keys($customers[0]) as $col) {
                echo "<th>" . htmlspecialchars($col) . "</th>";
              }
            }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($customers as $row): ?>
          <tr>
            <?php foreach ($row as $cell): ?>
              <td><?php echo htmlspecialchars($cell); ?></td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- jQuery + DataTables JS (CDN) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
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
