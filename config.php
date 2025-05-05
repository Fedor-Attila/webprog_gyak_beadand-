<<<<<<< HEAD
<?php
// Weboldal címe
$siteTitle = "Webprog Beadandó Projekt";

// Menüpontok
$menuItems = [
    'fooldal'      => 'Főoldal',
    'kepek'        => 'Képek',
    'kapcsolat'    => 'Kapcsolat',
    'uzenetek'     => 'Üzenetek',
    'belepes'      => 'Belépés',
    'kilepes'      => 'Kilépés',
    'regisztracio' => 'Regisztráció'
];

// Adatbázis kapcsolat beállítások
define('DB_HOST', '127.0.0.1'); // vagy próbáld: 'localhost'
define('DB_NAME', 'ccp9c6');
define('DB_USER', 'ccp9c6');
define('DB_PASSWORD', '19910226');

// Alapértelmezettként null a PDO kapcsolat
$dbh = null;

try {
    $dbh = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASSWORD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    // Hiba naplózása fájlba
    error_log("Adatbázis kapcsolódási hiba: " . $e->getMessage(), 3, __DIR__ . "/error_log.txt");

    // Figyelmeztetés a felhasználónak
    echo "<div style='color: red; font-weight: bold;'>⚠️ Nem sikerült kapcsolódni az adatbázishoz.</div>";
}

// Munkamenet indítása
session_start();
?>
=======
<?php
// Weboldal címe
$siteTitle = "Webprog Beadandó Projekt";

// Menüpontok tömbje: 'kulcs' => 'Megjelenítendő név'
$menuItems = [
    'fooldal'    => 'Főoldal',
    'kepek'      => 'Képek',
    'kapcsolat'  => 'Kapcsolat',
    'uzenetek'   => 'Üzenetek',
    'belepes'    => 'Belépés',
    'kilepes'    => 'Kilépés'
];

// Adatbázis kapcsolat beállításai
$db_config = [
    'host'     => 'localhost',
    'dbname'   => 'ccp9c6',
    'user'     => 'ccp9c6',
    'password' => '19910226' // FIGYELEM: csak helyi fejlesztéshez, publikáláskor ezt cseréld!
];
?>
>>>>>>> f9ba923058941e72b8d81edef34c580d2d8ce390
