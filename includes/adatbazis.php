<<<<<<< HEAD
<?php
// includes/adatbazis.php
require_once __DIR__ . '/../config.php';

try {
    $dbh = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Adatbázis hiba: " . $e->getMessage());
}
=======
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
>>>>>>> f9ba923058941e72b8d81edef34c580d2d8ce390
