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
