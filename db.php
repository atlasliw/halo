<?php
// test_password.php
require __DIR__ . '/config/database.php';

// 1) Fetch admin’s hash
$stmt = $pdo->prepare("SELECT password_hash FROM users WHERE username = :u");
$stmt->execute(['u' => 'admin']);
$hash = $stmt->fetchColumn();

if (! $hash) {
    die("No user 'admin' found or password_hash is empty.\n");
}

// 2) Show what’s in the DB
echo "Stored hash for admin:\n$hash\n\n";

// 3) Test password_verify
$passwordToTest = 'Admin';  // the password you think it should be
$ok = password_verify($passwordToTest, $hash);

echo "password_verify('{$passwordToTest}', stored_hash) returned: ";
echo $ok ? "TRUE\n" : "FALSE\n";
