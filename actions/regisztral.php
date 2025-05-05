<<<<<<< HEAD
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
=======
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
>>>>>>> f9ba923058941e72b8d81edef34c580d2d8ce390
