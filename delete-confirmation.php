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
    <?php include "./inc/title.php"; ?>

    <!-- Deletion Successful Message -->
    <div class="content row">
      <h1>Item has been successfully deleted</h1>
    </div>
    <!-- Footer -->
     <?php include "./inc/footer.php"; ?>
  </body>
</html>
