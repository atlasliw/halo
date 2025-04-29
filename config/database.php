<?php
// config.php

// 1) Database credentials
$db_host = 'localhost';               // or your Hostinger DB host
$db_user = 'u737908269_atlas';
$db_pass = '$1Rv1r@dmIn';
$db_name = 'u737908269_halo';


// ===== MySQLi example =====
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ( $mysqli->connect_errno ) {
    die("MySQLi connection failed: (" 
        . $mysqli->connect_errno . ") " 
        . $mysqli->connect_error
    );
}
// echo "MySQLi connected successfully";



// ===== PDO example =====
try {
    $dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";
    $pdo = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    // echo "PDO connected successfully";
} catch (PDOException $e) {
    die("PDO connection failed: " . $e->getMessage());
}
