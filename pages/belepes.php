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
