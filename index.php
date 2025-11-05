<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
  
<?php include("includes/demoAssets.php"); ?>
<?php include("includes/header.php"); ?>


<body>
  <?php include("includes/navbar.php"); ?>

  <main class="body w-100 h-100">
    <?php
    $page = $_GET['page'] ?? 'home';
    $allowedPages = ['home', 'roblox', 'minecraft', 'fqas', 'reports', 'account'];

    if (in_array($page, $allowedPages)) {
      include("includes/$page.php");
    } else {
      echo "<h2>404 - Page not found</h2>";
    }
    ?>
  </main>
  <?php include("includes/footer.php"); ?>
  <?php include("includes/js.php"); ?>
</body>





</html>