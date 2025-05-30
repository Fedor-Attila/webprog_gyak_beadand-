<<<<<<< HEAD
<?php
session_start();
require_once '../config.php';

$nev = $_POST['nev'] ?? '';
$email = $_POST['email'] ?? '';
$uzenet = $_POST['uzenet'] ?? '';

// Üzenetküldő neve: ha be van jelentkezve, használjuk a felhasználónevét, egyébként "Vendég"
$kuldo = isset($_SESSION['felhasznalo']) ? $_SESSION['felhasznalo'] : 'Vendég';

if ($email && $uzenet) {
    try {
        $stmt = $dbh->prepare("INSERT INTO uzenetek (nev, email, uzenet, datum) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$kuldo, $email, $uzenet]);

        $_SESSION['flash'] = "Üzeneted sikeresen elküldtük!";
        header("Location: ../index.php?page=kapcsolat");
        exit;

    } catch (PDOException $e) {
        $_SESSION['flash'] = "Hiba történt az üzenet mentésekor: " . $e->getMessage();
        header("Location: ../index.php?page=kapcsolat");
        exit;
    }
} else {
    $_SESSION['flash'] = "Az email és üzenet mező nem lehet üres!";
    header("Location: ../index.php?page=kapcsolat");
    exit;
}
=======
<?php
session_start();
require_once '../config.php';

$nev = $_POST['nev'] ?? '';
$email = $_POST['email'] ?? '';
$uzenet = $_POST['uzenet'] ?? '';

if ($email && $uzenet) {
    try {
        $dbh = new PDO("mysql:host={$db_config['host']};dbname={$db_config['dbname']}", $db_config['user'], $db_config['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        $dbh->query("SET NAMES utf8mb4 COLLATE utf8mb4_hungarian_ci");

        $stmt = $dbh->prepare("INSERT INTO uzenetek (nev, email, uzenet, datum) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$nev, $email, $uzenet]);

        $_SESSION['flash'] = "Üzeneted sikeresen elküldtük!";
        header("Location: ../index.php?page=kapcsolat");
        exit;

    } catch (PDOException $e) {
        $_SESSION['flash'] = "Hiba történt az üzenet mentésekor.";
        header("Location: ../index.php?page=kapcsolat");
        exit;
    }
} else {
    $_SESSION['flash'] = "Az email és üzenet mező nem lehet üres!";
    header("Location: ../index.php?page=kapcsolat");
    exit;
}
>>>>>>> f9ba923058941e72b8d81edef34c580d2d8ce390
