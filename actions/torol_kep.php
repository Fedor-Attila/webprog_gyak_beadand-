<?php
session_start();

if (!isset($_SESSION['felhasznalo'])) {
    $_SESSION['flash'] = "A törléshez be kell jelentkezni.";
    header("Location: ../index.php?page=kepek");
    exit;
}

$fajl = basename($_POST['fajl'] ?? '');
$utvonal = "../uploads/" . $fajl;

// Ellenőrizzük, hogy a fájl valóban a feltöltési mappában van-e
$realPath = realpath($utvonal);
$uploadsPath = realpath('../uploads/');

if (strpos($realPath, $uploadsPath) !== 0) {
    $_SESSION['flash'] = "Érvénytelen fájl elérési út.";
    header("Location: ../index.php?page=kepek");
    exit;
}

if ($fajl && file_exists($utvonal)) {
    if (unlink($utvonal)) {
        $_SESSION['flash'] = "A kép sikeresen törölve lett.";
    } else {
        $_SESSION['flash'] = "Hiba történt a törlés során.";
    }
} else {
    $_SESSION['flash'] = "A megadott fájl nem található.";
}

header("Location: ../index.php?page=kepek");
exit;
