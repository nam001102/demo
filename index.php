<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<?php include("includes/demoAssets.php"); ?>
<?php include("includes/header.php"); ?>


<body>
  <?php
  $page = $_GET['page'] ?? 'home';
  $allowedPages = ['home', 'roblox', 'minecraft', 'fqas', 'reports', 'account', 'login', 'ranking'];

  // show navbar only if not login or ranking
  if (!in_array($page, ['login', 'ranking'])) {
    include("includes/navbar.php");
  }
  ?>

  <main class="body">
    <?php
    if (in_array($page, $allowedPages)) {
      include("includes/$page.php");
    } else {
      echo "<h2>404 - Page not found</h2>";
    }
    ?>
  </main>

  <?php
  // show footer only if not login or ranking
  if (!in_array($page, ['login', 'ranking'])) {
    include("includes/footer.php");
  }

  include("includes/js.php");
  ?>
</body>

</html>