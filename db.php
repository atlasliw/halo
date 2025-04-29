<?php
session_start();
require __DIR__ . '/config/database.php'; // adjust path if needed

// Show all errors (DEV only)
ini_set('display_errors',1);
error_reporting(E_ALL);

$error = '';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if ($username === '' || $password === '') {
        $error = 'Please enter both username and password.';
    } else {
        $stmt = $pdo->prepare('
            SELECT id, username, password_hash
            FROM users
            WHERE username = :u OR email = :u
            LIMIT 1
        ');
        $stmt->execute(['u' => $username]);
        $user = $stmt->fetch();

        // === DEBUGGING BLOCK START ===
        echo "<pre>";
        echo "Input username: {$username}\n";
        echo "Input password: {$password}\n\n";
        
        if ($user) {
            echo "DB row:\n";
            echo "  id: {$user['id']}\n";
            echo "  username: {$user['username']}\n";
            echo "  password_hash: {$user['password_hash']}\n\n";
            $check = password_verify($password, $user['password_hash']) ? 'true' : 'false';
            echo "password_verify result: {$check}\n";
        } else {
            echo "No user found for '{$username}'.\n";
        }
        echo "</pre>";
        exit;
        // === DEBUGGING BLOCK END ===

        // (Original logic below, will never run until you remove the exit)
        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Invalid username or password.';
        }
    }
}
?>
