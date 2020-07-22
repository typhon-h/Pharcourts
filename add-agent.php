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
    <!-- Form Validation -->
    <div class="content column">
      <span class="error">
        <?php include "./inc/add-agent-validation.php"; ?>
      </span>
      <!-- Add Agent Form -->
      <?php include "./inc/add-agent-form.php"; ?>
    </div>

    <!-- Footer -->
     <?php include "./inc/footer.php"; ?>
  </body>
</html>
