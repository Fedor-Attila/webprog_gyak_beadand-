<<<<<<< HEAD
<div class="container my-5">
    <h2 class="mb-4">Regisztráció</h2>
    
    <?php if (isset($_SESSION['flash'])): ?>
        <div class="alert alert-<?= strpos($_SESSION['flash'], 'Sikeres') !== false ? 'success' : 'danger' ?>">
            <?= $_SESSION['flash'] ?>
            <?php unset($_SESSION['flash']); ?>
        </div>
    <?php endif; ?>
    
    <form action="actions/regisztral.php" method="POST">
        <div class="mb-3">
            <label for="nev" class="form-label">Teljes név:</label>
            <input type="text" class="form-control" id="nev" name="nev" required>
        </div>
        <div class="mb-3">
            <label for="felhasznalo" class="form-label">Felhasználónév:</label>
            <input type="text" class="form-control" id="felhasznalo" name="felhasznalo" required>
        </div>
        <div class="mb-3">
            <label for="jelszo" class="form-label">Jelszó:</label>
            <input type="password" class="form-control" id="jelszo" name="jelszo" required>
        </div>
        <button type="submit" class="btn btn-primary">Regisztráció</button>
    </form>
    
    <div class="mt-4 text-center">
        <p>Már van fiókja? <a href="index.php?page=belepes" class="btn btn-link">Jelentkezzen be!</a></p>
    </div>
</div>
=======
<div class="container my-4">
  <h2>Regisztráció</h2>
  <form action="actions/regisztral.php" method="post" class="needs-validation" novalidate>
    <div class="mb-3">
      <label for="nev" class="form-label">Teljes név:</label>
      <input type="text" name="nev" id="nev" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="felhasznalonev" class="form-label">Felhasználónév:</label>
      <input type="text" name="felhasznalonev" id="felhasznalonev" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="jelszo" class="form-label">Jelszó:</label>
      <input type="password" name="jelszo" id="jelszo" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Regisztráció</button>
  </form>
  <p class="mt-3">Már van fiókod? <a href="index.php?page=belepes">Lépj be itt</a>.</p>
</div>
>>>>>>> f9ba923058941e72b8d81edef34c580d2d8ce390
