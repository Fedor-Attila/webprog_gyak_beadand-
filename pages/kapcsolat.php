<<<<<<< HEAD
<div class="container my-4">
  <h2>Kapcsolat</h2>
  <form action="actions/uzenetkuldes.php" method="post" onsubmit="return ellenoriz();" class="needs-validation" novalidate>
    <div class="mb-3">
      <label for="nev" class="form-label">Név:</label>
      <input type="text" name="nev" id="nev" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email:</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="uzenet" class="form-label">Üzenet:</label>
      <textarea name="uzenet" id="uzenet" rows="5" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Küldés</button>
  </form>
</div>

<script>
function ellenoriz() {
  const email = document.getElementById("email").value;
  const uzenet = document.getElementById("uzenet").value;
  if (!email.includes('@') || uzenet.trim().length < 5) {
    alert("Hibás email vagy túl rövid üzenet.");
    return false;
  }
  return true;
}
</script>
=======
<div class="container my-4">
  <h2>Kapcsolat</h2>
  <form action="actions/uzenetkuldes.php" method="post" onsubmit="return ellenoriz();" class="needs-validation" novalidate>
    <div class="mb-3">
      <label for="nev" class="form-label">Név:</label>
      <input type="text" name="nev" id="nev" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email:</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="uzenet" class="form-label">Üzenet:</label>
      <textarea name="uzenet" id="uzenet" rows="5" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Küldés</button>
  </form>
</div>

<script>
function ellenoriz() {
  const email = document.getElementById("email").value;
  const uzenet = document.getElementById("uzenet").value;
  if (!email.includes('@') || uzenet.trim().length < 5) {
    alert("Hibás email vagy túl rövid üzenet.");
    return false;
  }
  return true;
}
</script>
>>>>>>> f9ba923058941e72b8d81edef34c580d2d8ce390
