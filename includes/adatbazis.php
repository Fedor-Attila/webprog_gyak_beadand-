<?php
// includes/adatbazis.php
require_once __DIR__ . '/../config.php';

try {
    $dbh = new PDO(
        "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset=utf8",
        $db_config['user'],
        $db_config['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Adatbázis hiba: " . $e->getMessage());
}
