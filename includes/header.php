<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($siteTitle) ? $siteTitle : 'Webprog Beadandó Projekt'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      #kep {
        background-color: #f0f8ff; /* halványkék háttér */
        border: 2px solid #007bff; /* kék keret */
        padding: 10px;
        border-radius: 6px;
      }
    </style>
</head>
<body>

<?php if (isset($_SESSION['flash'])): ?>
  <script>
    alert("<?= htmlspecialchars($_SESSION['flash']) ?>");
  </script>
  <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<header class="bg-primary text-white py-3 mb-4">
  <div class="container">
    <h1 class="h3"><?php echo isset($siteTitle) ? $siteTitle : 'Webprog Beadandó Projekt'; ?></h1>
    <?php if (isset($_SESSION['user'])): ?>
      <p class="mb-0">
        Bejelentkezett: <?= htmlspecialchars($_SESSION['user']['nev']) ?>
        (<?= htmlspecialchars($_SESSION['user']['bejelentkezes']) ?>)
      </p>
    <?php endif; ?>
  </div>
</header>
