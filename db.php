<?php
// generate_hash.php
// Usage: run `php generate_hash.php` from CLI or load in browser.

$password = 'admin'; // <-- change this to whatever password you need to hash

// Generate the hash using PHP's built-in PASSWORD_DEFAULT (currently Bcrypt)
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Hash for '{$password}':\n\n" . $hash . "\n";
