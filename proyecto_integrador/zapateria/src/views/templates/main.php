<!doctype html>
<html lang="es">
<?php include_once __DIR__ . '/../components/shared/head/head.php'; ?>
<body>
  <?php include_once __DIR__ ."/../components/shared/nav/navbar.php";?>
  <?php include_once __DIR__ ."/../pages/" . ($template ?? 'home') . ".php";?>
  <?php  include_once __DIR__ ."/../components/shared/footer/footer.php"; ?>
</body>
</html>