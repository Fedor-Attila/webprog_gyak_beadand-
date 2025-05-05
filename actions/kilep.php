
<?php
session_start();

// Minden session változót törlünk
$_SESSION = [];

// Session cookie törlése (ha használva van)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Session teljes megsemmisítése
session_destroy();

// Újraindítjuk a session-t a flash üzenethez
session_start();
$_SESSION['flash'] = "Sikeresen kiléptél!";
header("Location: ../index.php?page=belepes");
exit;

