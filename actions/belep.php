<<<<<<< HEAD
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
=======
<?php
session_start();
require_once '../config.php';

$felhasznalonev = $_POST['felhasznalonev'] ?? '';
$jelszo = $_POST['jelszo'] ?? '';

if ($felhasznalonev && $jelszo) {
    try {
        $dbh = new PDO("mysql:host={$db_config['host']};dbname={$db_config['dbname']}", $db_config['user'], $db_config['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        $dbh->query("SET NAMES utf8mb4 COLLATE utf8mb4_hungarian_ci");

        $stmt = $dbh->prepare("SELECT * FROM felhasznalok WHERE bejelentkezes = ? AND jelszo = ?");
        $stmt->execute([$felhasznalonev, sha1($jelszo)]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['user'] = $user;
            $_SESSION['flash'] = "Sikeres belépés!";
            header("Location: ../index.php?page=fooldal");
            exit;
        } else {
            $_SESSION['flash'] = "Hibás belépési adatok!";
            header("Location: ../index.php?page=belepes");
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['flash'] = "Adatbázis hiba: " . $e->getMessage();
        header("Location: ../index.php?page=belepes");
        exit;
    }
} else {
    $_SESSION['flash'] = "Minden mező kitöltése kötelező!";
    header("Location: ../index.php?page=belepes");
    exit;
}
>>>>>>> f9ba923058941e72b8d81edef34c580d2d8ce390
