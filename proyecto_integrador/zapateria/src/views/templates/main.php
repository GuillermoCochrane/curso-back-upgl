<!doctype html>
<html lang="es">
<?php include_once __DIR__ . '/../components/shared/head/head.php'; ?>
<body class="bg-body-tertiary">
  <?php include_once __DIR__ ."/../components/shared/header/header.php";?>
  <?php include_once __DIR__ ."/../pages/" . ($template ?? 'home') . ".php";?>
  <?php include_once __DIR__ ."/../components/shared/footer/footer.php"; ?>
  <?php include_once __DIR__ ."/../scripts/" . ($scripts ?? 'home') . ".php";?>
</body>
</html>