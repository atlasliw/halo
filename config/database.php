<?php
// database.php

// show all errors (for development only!)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// your credentials
$host    = 'localhost';
$db      = 'u737908269_halo';
$user    = 'u737908269_atlas';
$pass    = '$1Rv1r@dmIn';
$charset = 'utf8mb4';

// DSN & PDO options
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // if connection fails, show the error and exit
    die("Database connection failed: " . $e->getMessage());
}
