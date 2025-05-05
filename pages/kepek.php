<<<<<<< HEAD
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="container my-4">
  <h2>Képgaléria</h2>

  <?php
  $kepek = [];
  $uploads_dir = 'uploads';

  if (!is_dir($uploads_dir)) {
    echo "<div class='alert alert-warning'>A képek mappája (<code>$uploads_dir</code>) nem létezik.</div>";
  } else {
    $talalatok = glob("$uploads_dir/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
    if ($talalatok !== false) {
      $kepek = array_map('basename', $talalatok);
    }

    if (empty($kepek)) {
      echo "<div class='alert alert-info'>Nincs feltöltött kép.</div>";
    }
  }

  // Flash üzenet kiírása (ha van)
  if (!empty($_SESSION['flash'])) {
      echo "<div class='alert alert-success'>" . htmlspecialchars($_SESSION['flash']) . "</div>";
      unset($_SESSION['flash']);
  }
  ?>

  <?php if (isset($_SESSION['felhasznalo'])): ?>
    <form action="actions/feltolt_kep.php" method="post" enctype="multipart/form-data" class="mb-4">
      <div class="mb-3">
        <label for="kep" class="form-label">Kép feltöltése:</label>
        <input type="file" name="kep" id="kep" class="form-control-lg border-primary" accept=".jpg,.jpeg,.png,.gif" required>
      </div>
      <button type="submit" class="btn btn-primary">Feltöltés</button>
    </form>
  <?php endif; ?>

  <div class="row">
    <?php foreach ($kepek as $fajl): ?>
      <div class="col-md-3 mb-4">
        <div class="card">
          <img src="uploads/<?= $fajl ?>" class="card-img-top" alt="<?= htmlspecialchars($fajl) ?>">
          <div class="card-body text-center">
            <?php if (isset($_SESSION['felhasznalo'])): ?>
              <form action="actions/torol_kep.php" method="post" onsubmit="return confirm('Biztosan törlöd?');">
                <input type="hidden" name="fajl" value="<?= htmlspecialchars($fajl) ?>">
                <button type="submit" class="btn btn-danger btn-sm">Törlés</button>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
=======
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="container my-4">
  <h2>Képgaléria</h2>

  <?php
  $kepek = [];
  $uploads_dir = 'uploads';

  if (!is_dir($uploads_dir)) {
    echo "<div class='alert alert-warning'>A képek mappája (<code>$uploads_dir</code>) nem létezik.</div>";
  } else {
    $talalatok = glob("$uploads_dir/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
    if ($talalatok !== false) {
      $kepek = array_map('basename', $talalatok);
    }

    if (empty($kepek)) {
      echo "<div class='alert alert-info'>Nincs feltöltött kép.</div>";
    }
  }

  // Flash üzenet kiírása (ha van)
  if (!empty($_SESSION['flash'])) {
      echo "<div class='alert alert-success'>" . htmlspecialchars($_SESSION['flash']) . "</div>";
      unset($_SESSION['flash']);
  }
  ?>

  <?php if (isset($_SESSION['user'])): ?>
    <form action="actions/feltolt_kep.php" method="post" enctype="multipart/form-data" class="mb-4">
      <div class="mb-3">
        <label for="kep" class="form-label">Kép feltöltése:</label>
        <input type="file" name="kep" id="kep" class="form-control-lg border-primary" accept=".jpg,.jpeg,.png,.gif" required>
      </div>
      <button type="submit" class="btn btn-primary">Feltöltés</button>
    </form>
  <?php endif; ?>

  <div class="row">
    <?php foreach ($kepek as $fajl): ?>
      <div class="col-md-3 mb-4">
        <div class="card">
          <img src="uploads/<?= $fajl ?>" class="card-img-top" alt="<?= htmlspecialchars($fajl) ?>">
          <div class="card-body text-center">
            <?php if (isset($_SESSION['user'])): ?>
              <form action="actions/torol_kep.php" method="post" onsubmit="return confirm('Biztosan törlöd?');">
                <input type="hidden" name="fajl" value="<?= htmlspecialchars($fajl) ?>">
                <button type="submit" class="btn btn-danger btn-sm">Törlés</button>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
>>>>>>> f9ba923058941e72b8d81edef34c580d2d8ce390
