<?php
// export_schema.php
// Usage: php export_schema.php > full_schema.sql

require __DIR__ . '/config/database.php'; // this should set up your $pdo

// 1) Fetch all table names in the current database
$tables = $pdo
    ->query("SHOW TABLES")
    ->fetchAll(PDO::FETCH_COLUMN);

if (! $tables) {
    fwrite(STDERR, "No tables found or failed to fetch tables.\n");
    exit(1);
}

// 2) For each table, output its CREATE statement
foreach ($tables as $table) {
    echo "-- --------------------------------------------------------\n";
    echo "-- Table structure for `$table`\n";
    echo "-- --------------------------------------------------------\n";
    $row = $pdo
        ->query("SHOW CREATE TABLE `{$table}`")
        ->fetch(PDO::FETCH_ASSOC);
    echo $row['Create Table'] . ";\n\n";
}
