<?php
if (!isset($_SESSION['user'])) {
    echo "<div class='container my-4'><p class='alert alert-warning'>Az üzenetek megtekintéséhez be kell jelentkezni.</p></div>";
    return;
}

require_once 'config.php';

try {
    $dbh = new PDO("mysql:host={$db_config['host']};dbname={$db_config['dbname']}", $db_config['user'], $db_config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    $dbh->query("SET NAMES utf8mb4 COLLATE utf8mb4_hungarian_ci");

    $stmt = $dbh->query("SELECT * FROM uzenetek ORDER BY datum DESC");
    $uzenetek = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<div class='container my-4'><div class='alert alert-danger'>Adatbázis hiba: {$e->getMessage()}</div></div>";
    return;
}
?>

<div class="container my-4">
  <h2>Kapcsolati üzenetek</h2>
  <?php if (!$uzenetek): ?>
    <p>Még nem érkezett üzenet.</p>
  <?php else: ?>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Név</th>
            <th>Email</th>
            <th>Üzenet</th>
            <th>Dátum</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($uzenetek as $u): ?>
            <tr>
              <td><?= htmlspecialchars($u['nev'] ?: 'Vendég') ?></td>
              <td><?= htmlspecialchars($u['email']) ?></td>
              <td><?= nl2br(htmlspecialchars($u['uzenet'])) ?></td>
              <td><?= $u['datum'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>
