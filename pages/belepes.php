<<<<<<< HEAD
<div class="container my-5">
    <h2 class="mb-4">Bejelentkezés</h2>
    
    <?php if (isset($_SESSION['flash'])): ?>
        <div class="alert alert-<?= strpos($_SESSION['flash'], 'Sikeres') !== false ? 'success' : 'danger' ?>">
            <?= $_SESSION['flash'] ?>
            <?php unset($_SESSION['flash']); ?>
        </div>
    <?php endif; ?>
    
    <form action="actions/belep.php" method="POST">
        <div class="mb-3">
            <label for="bejelentkezes" class="form-label">Felhasználónév:</label>
            <input type="text" class="form-control" id="bejelentkezes" name="bejelentkezes" required>
        </div>
        <div class="mb-3">
            <label for="jelszo" class="form-label">Jelszó:</label>
            <input type="password" class="form-control" id="jelszo" name="jelszo" required>
        </div>
        <button type="submit" class="btn btn-primary">Bejelentkezés</button>
    </form>
    
    <div class="mt-4 text-center">
        <p>Nincs még fiókja? <a href="index.php?page=regisztracio" class="btn btn-link">Regisztráljon most!</a></p>
    </div>
</div>
=======
<div class="container my-4">
  <h2>Belépés</h2>
  <form action="actions/belep.php" method="post" class="needs-validation" novalidate>
    <div class="mb-3">
      <label for="felhasznalonev" class="form-label">Felhasználónév:</label>
      <input type="text" name="felhasznalonev" id="felhasznalonev" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="jelszo" class="form-label">Jelszó:</label>
      <input type="password" name="jelszo" id="jelszo" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Belépés</button>
  </form>
  <p class="mt-3">Ha még nincs fiókod, <a href="index.php?page=regisztracio">regisztrálj itt</a>.</p>
</div>
>>>>>>> f9ba923058941e72b8d81edef34c580d2d8ce390
