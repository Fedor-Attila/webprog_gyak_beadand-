<<<<<<< HEAD
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
=======
<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['flash'] = "A törléshez be kell jelentkezni.";
    header("Location: ../index.php?page=kepek");
    exit;
}

$fajl = basename($_POST['fajl'] ?? '');
$utvonal = "../uploads/" . $fajl;

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

// Ellenőrizzük, hogy a fájl valóban a feltöltési mappában van-e
$realPath = realpath($utvonal);
$uploadsPath = realpath('../uploads/');

if (strpos($realPath, $uploadsPath) !== 0) {
    $_SESSION['flash'] = "Érvénytelen fájl elérési út.";
    header("Location: ../index.php?page=kepek");
    exit;
}
>>>>>>> f9ba923058941e72b8d81edef34c580d2d8ce390
