<?php
session_start();
require_once '../config.php';

if (empty($_POST['nev']) || empty($_POST['felhasznalo']) || empty($_POST['jelszo'])) {
    $_SESSION['flash'] = "Minden mező kitöltése kötelező!";
    header("Location: ../index.php?page=regisztracio");
    exit;
}

$nev = $_POST['nev'];
$felhasznalo = $_POST['felhasznalo'];
$jelszo = password_hash($_POST['jelszo'], PASSWORD_DEFAULT);

try {
    // Felhasználónév ellenőrzése
    $check_stmt = $dbh->prepare("SELECT id FROM felhasznalok WHERE bejelentkezes = :felhasznalo");
    $check_stmt->execute(['felhasznalo' => $felhasznalo]);

    if ($check_stmt->rowCount() > 0) {
        $_SESSION['flash'] = "Ez a felhasználónév már foglalt!";
        header("Location: ../index.php?page=regisztracio");
        exit;
    }

    // Regisztráció végrehajtása
    $insert_stmt = $dbh->prepare("INSERT INTO felhasznalok (nev, bejelentkezes, jelszo) VALUES (:nev, :felhasznalo, :jelszo)");
    $insert_stmt->execute([
        'nev' => $nev,
        'felhasznalo' => $felhasznalo,
        'jelszo' => $jelszo
    ]);

    $_SESSION['flash'] = "Sikeres regisztráció! Most már bejelentkezhet.";
    header("Location: ../index.php?page=belepes");
} catch (PDOException $e) {
    $_SESSION['flash'] = "Hiba történt a regisztráció során: " . $e->getMessage();
    header("Location: ../index.php?page=regisztracio");
}

exit;
?>
