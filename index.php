<<<<<<< HEAD
<?php
// index.php - Front Controller minta alapja

session_start();
require_once 'config.php';

// PHP hibák megjelenítése fejlesztéshez
error_reporting(E_ALL);
ini_set('display_errors', 1);

$page = $_GET['page'] ?? 'fooldal';

include 'includes/header.php';
include 'includes/menu.php';

// Flash üzenet megjelenítése (popup alert)
if (isset($_SESSION['flash'])) {
    echo "<script>alert('" . addslashes($_SESSION['flash']) . "');</script>";
    unset($_SESSION['flash']);
}

// Betöltjük a kért oldalt, ha létezik a pages könyvtárban
$pageFile = "pages/{$page}.php";
if (file_exists($pageFile)) {
    include $pageFile;
} else {
    echo "<div class='container my-4'><h2>Az oldal nem található!</h2></div>";
}

include 'includes/footer.php';
=======
<?php
// index.php - Front Controller minta alapja

session_start();
require_once 'config.php';

// PHP hibák megjelenítése fejlesztéshez
error_reporting(E_ALL);
ini_set('display_errors', 1);

$page = $_GET['page'] ?? 'fooldal';

include 'includes/header.php';
include 'includes/menu.php';

// Flash üzenet megjelenítése (popup alert)
if (isset($_SESSION['flash'])) {
    echo "<script>alert('" . addslashes($_SESSION['flash']) . "');</script>";
    unset($_SESSION['flash']);
}

// Betöltjük a kért oldalt, ha létezik a pages könyvtárban
$pageFile = "pages/{$page}.php";
if (file_exists($pageFile)) {
    include $pageFile;
} else {
    echo "<div class='container my-4'><h2>Az oldal nem található!</h2></div>";
}

include 'includes/footer.php';
>>>>>>> f9ba923058941e72b8d81edef34c580d2d8ce390
