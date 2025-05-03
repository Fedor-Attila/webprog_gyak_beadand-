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
