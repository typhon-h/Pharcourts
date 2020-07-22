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

    <div class="content row">
      <!-- Sidebar for choose agent to edit -->
      <?php include "./inc/edit-agent-sidebar.php"; ?>

      <div class="column">
        <!-- Form Validation -->
        <span class="error">
          <?php include "./inc/edit-agent-validation.php"; ?>
        </span>

        <!-- Edit Agent Form -->
        <?php include "./inc/edit-agent-form.php"; ?>
      </div>
    </div>

    <!-- Footer -->
     <?php include "./inc/footer.php"; ?>
  </body>
</html>
