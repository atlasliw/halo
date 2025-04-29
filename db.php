<?php
// subscription_debug.php

// 1) Turn on full error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2) Include your PDO database connection
require __DIR__ . '/config/database.php';

// 3) Enforce login
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// 4) Your subscription‐lookup SQL
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
    CONCAT(FORMAT(s.cost,2), ' ', t.currency) AS cost,
    u.username       AS requested_by,
    DATE_FORMAT(s.created_at, '%Y-%m-%d %H:%i:%s') AS created_at,
    DATE_FORMAT(s.updated_at, '%Y-%m-%d %H:%i:%s') AS updated_at
  FROM subscriptions s
  JOIN customers              c   ON s.customer_id = c.id
  JOIN products               p   ON s.product_id  = p.id
  JOIN subscription_statuses  sts ON s.status_id   = sts.id
  JOIN license_types          lt  ON s.type_id     = lt.id
  JOIN users                  u   ON s.requested_by_user_id = u.id
  JOIN product_pricing        t   ON t.product_id = s.product_id 
                                   AND t.billing_cycle='one_time'
  ORDER BY s.id DESC
";

// 5) Try/catch around prepare() / execute()
try {
    $stmt = $pdo->prepare($sql);
    if (!$stmt->execute()) {
        $err = $stmt->errorInfo();
        throw new Exception("Execute failed: " . $err[2]);
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    // we'll display this in the HTML below
    $debugError = $e->getMessage();
    $pdoErr    = $pdo->errorInfo();
    $stmtErr   = isset($stmt) ? $stmt->errorInfo() : null;
    $rows      = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Subscription Debug</title>
  <style>
    body { font-family: sans-serif; margin: 2em; }
    pre   { background: #f5f5f5; padding: 1em; border: 1px solid #ddd; overflow: auto; }
  </style>
</head>
<body>

  <h1>Subscription Debug Output</h1>

  <?php if (!empty($debugError)): ?>
    <h2 style="color: #c00;">❌ SQL Error:</h2>
    <pre><?= htmlspecialchars($debugError) ?></pre>

    <h3>PDO errorInfo()</h3>
    <pre><?= htmlspecialchars(print_r($pdoErr, true)) ?></pre>

    <?php if ($stmtErr): ?>
      <h3>Statement errorInfo()</h3>
      <pre><?= htmlspecialchars(print_r($stmtErr, true)) ?></pre>
    <?php endif; ?>

  <?php else: ?>
    <h2 style="color:#060;">✅ Query ran successfully</h2>
    <h3>Fetched <?= count($rows) ?> rows</h3>
    <pre><?= htmlspecialchars(print_r($rows, true)) ?></pre>
  <?php endif; ?>

</body>
</html>
