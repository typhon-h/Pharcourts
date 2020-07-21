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
      <?php include "./inc/edit-agent-sidebar.php"; ?>

      <div class="column">
        <span class="error">
          <?php include "./inc/edit-agent-validation.php"; ?>
        </span>

        <?php include "./inc/edit-agent-form.php"; ?>
      </div>
    </div>

    <!-- Footer -->
     <?php include "./inc/footer.php"; ?>
  </body>
</html>
