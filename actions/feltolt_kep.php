<<<<<<< HEAD
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['felhasznalo'])) {
    header("Location: ../index.php?page=belepes");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['kep']) && $_FILES['kep']['error'] === UPLOAD_ERR_OK) {
    $fajlnev = $_FILES['kep']['name'];
    $atmeneti = $_FILES['kep']['tmp_name'];
    $celmappa = '../uploads/';

    $kiterjesztes = strtolower(pathinfo($fajlnev, PATHINFO_EXTENSION));
    $ervenyes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($kiterjesztes, $ervenyes)) {
        if (!is_dir($celmappa)) {
            mkdir($celmappa, 0755, true);
        }

        $celutvonal = $celmappa . basename($fajlnev);

        if (move_uploaded_file($atmeneti, $celutvonal)) {
            $_SESSION['flash'] = "Sikeres feltöltés!";
        } else {
            $_SESSION['flash'] = "Hiba történt a feltöltés során.";
        }
    } else {
        $_SESSION['flash'] = "Csak JPG, JPEG, PNG és GIF formátum engedélyezett.";
    }
} else {
    $_SESSION['flash'] = "Nem megfelelő kérés.";
}

header("Location: ../index.php?page=kepek");
exit;
=======
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header("Location: ../index.php?page=belepes");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['kep']) && $_FILES['kep']['error'] === UPLOAD_ERR_OK) {
    $fajlnev = $_FILES['kep']['name'];
    $atmeneti = $_FILES['kep']['tmp_name'];
    $celmappa = '../uploads/';

    $kiterjesztes = strtolower(pathinfo($fajlnev, PATHINFO_EXTENSION));
    $ervenyes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($kiterjesztes, $ervenyes)) {
        if (!is_dir($celmappa)) {
            mkdir($celmappa, 0755, true);
        }

        $celutvonal = $celmappa . basename($fajlnev);

        if (move_uploaded_file($atmeneti, $celutvonal)) {
            $_SESSION['flash'] = "Sikeres feltöltés!";
        } else {
            $_SESSION['flash'] = "Hiba történt a feltöltés során.";
        }
    } else {
        $_SESSION['flash'] = "Csak JPG, JPEG, PNG és GIF formátum engedélyezett.";
    }
} else {
    $_SESSION['flash'] = "Nem megfelelő kérés.";
}

header("Location: ../index.php?page=kepek");
exit;
>>>>>>> f9ba923058941e72b8d81edef34c580d2d8ce390
