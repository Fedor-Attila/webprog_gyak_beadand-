<?php
session_start();
require_once '../config.php';

if (empty($_POST['bejelentkezes']) || empty($_POST['jelszo'])) {
    $_SESSION['flash'] = "Minden mező kitöltése kötelező!";
    header("Location: ../index.php?page=belepes");
    exit;
}

$bejelentkezes = $_POST['bejelentkezes'];
$jelszo = $_POST['jelszo'];

try {
    $stmt = $dbh->prepare("SELECT * FROM felhasznalok WHERE bejelentkezes = :bejelentkezes");
    $stmt->execute(['bejelentkezes' => $bejelentkezes]);

    if ($stmt->rowCount() === 1) {
        $felhasznalo = $stmt->fetch();

        if (password_verify($jelszo, $felhasznalo['jelszo'])) {
            $_SESSION['felhasznalo'] = $felhasznalo['bejelentkezes'];
            $_SESSION['flash'] = "Sikeres bejelentkezés!";
            header("Location: ../index.php");
        } else {
            $_SESSION['flash'] = "Hibás jelszó!";
            header("Location: ../index.php?page=belepes");
        }
    } else {
        $_SESSION['flash'] = "Nem létező felhasználó!";
        header("Location: ../index.php?page=belepes");
    }
} catch (PDOException $e) {
    $_SESSION['flash'] = "Adatbázis hiba: " . $e->getMessage();
    header("Location: ../index.php?page=belepes");
}

exit;
?>
