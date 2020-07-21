<!DOCTYPE html>
<html lang="en">
  <!-- Head content -->
  <?php include "./inc/head.php"; ?>

  <body id="body">

    <!-- Navigation -->
    <?php include "./inc/nav.php"; ?>

    <!-- Title Section -->
    <?php include "./inc/title.php"; ?>

    <div class="content row">
      <?php include "./inc/add-listing-sidebar.php" ?>
      <div class="column">
        <span class="error">
          <?php include "./inc/add-listing-validation.php"; ?>
        </span>

        <?php include "./inc/add-listing-form.php"; ?>
      </div>
    </div>

    <!-- Footer -->
     <?php include "./inc/footer.php"; ?>
  </body>
</html>
