<!DOCTYPE html>
<html lang="en">
  <!-- Head content -->
  <?php include "./inc/head.php"; ?>
  <?php
    if ($_SESSION['IsAdmin'] == false) { //If not logged in redirect home
      header('Location: ./index.php');
    }
   ?>

  <body id="body">

    <!-- Navigation -->
    <?php include "./inc/nav.php"; ?>

    <!-- Title Section -->
    <!-- Displays Welcome Message -->
    <?php include "./inc/title.php"; ?>

    <!-- Footer -->
     <?php include "./inc/footer.php"; ?>
  </body>
</html>
