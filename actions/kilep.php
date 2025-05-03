<?php
session_start();
session_unset();
session_destroy();

session_start(); // újraindítjuk a sessiont, hogy flash működjön
$_SESSION['flash'] = "Sikeresen kiléptél!";
header("Location: ../index.php?page=belepes");
exit;
