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
      <!-- Sidebar for choose listing to edit -->
      <?php include "./inc/edit-listing-sidebar.php"; ?>

      <div class="column">
        <!-- Form Validation -->
        <span class="error">
          <?php include "./inc/edit-listing-validation.php"; ?>
        </span>

        <!-- Edit Listing Form -->
        <?php include "./inc/edit-listing-form.php"; ?>
      </div>
    </div>

    <!-- Footer -->
     <?php include "./inc/footer.php"; ?>
  </body>
</html>
