<nav class="bg-light">
  <div class="container">
    <ul class="nav nav-pills my-2">
      <?php foreach ($menuItems as $key => $label): ?>
        <?php
        if ($key === 'belepes' && isset($_SESSION['user'])) continue;
        if (in_array($key, ['kilepes', 'uzenetek']) && !isset($_SESSION['user'])) continue;

        // Kilépés külön linkként, ne az index.php page paramétere legyen
        if ($key === 'kilepes') {
          echo "<li class='nav-item'><a class='nav-link' href='actions/kilep.php'>{$label}</a></li>";
          continue;
        }

        $active = ($_GET['page'] ?? 'fooldal') === $key ? 'active' : '';
        echo "<li class='nav-item'><a class='nav-link {$active}' href='index.php?page={$key}'>{$label}</a></li>";
        ?>
      <?php endforeach; ?>
    </ul>
  </div>
</nav>
