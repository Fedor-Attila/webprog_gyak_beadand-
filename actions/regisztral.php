<?php
session_start();
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nev = $_POST['nev'] ?? '';
    $felhasznalonev = $_POST['felhasznalonev'] ?? '';
    $jelszo = $_POST['jelszo'] ?? '';

    if ($nev && $felhasznalonev && $jelszo) {
        try {
            $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            $dbh->query("SET NAMES utf8mb4 COLLATE utf8mb4_hungarian_ci");

            $stmt = $dbh->prepare("INSERT INTO felhasznalok (nev, bejelentkezes, jelszo) VALUES (?, ?, ?)");
            $stmt->execute([$nev, $felhasznalonev, sha1($jelszo)]);

            $_SESSION['flash'] = "Sikeres regisztráció!";
            header("Location: ../index.php?page=belepes");
            exit;

        } catch (PDOException $e) {
            if ($e->getCode() == 23000 && str_contains($e->getMessage(), 'bejelentkezes')) {
                $_SESSION['flash'] = "Ez a felhasználónév már foglalt. Kérlek, válassz másikat.";
            } else {
                $_SESSION['flash'] = "Adatbázis hiba történt, vagy a felhasználó már létezik";
            }
            header("Location: ../index.php?page=regisztracio");
            exit;
        }
    } else {
        $_SESSION['flash'] = "Minden mező kitöltése kötelező!";
        header("Location: ../index.php?page=regisztracio");
        exit;
    }
} else {
    header("Location: ../index.php?page=regisztracio");
    exit;
}
