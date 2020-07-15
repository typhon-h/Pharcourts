<!DOCTYPE html>
 <html lang="en">
   <!-- Head content -->
   <?php
     include "./inc/head.php";
     if(isset($_GET['AID'])){ //Only load page if navigated to from agent card
       $ID = $_GET['AID'];
       $agent = get_from_table("tbl_agents","tbl_agents.AID = {$ID}")[0];
     }
     else{ //Redirect to agents
       header("Location: ./agents.php");
     }

   ?>

   <body id="body">

     <!-- Navigation -->
     <?php include "./inc/nav.php"; ?>

     <!-- Title Section -->
     <?php include "./inc/title.php"; ?>

     <div class="content column">
       <?php include "./inc/agent-info.php" ?>
       <hr class="solid">
      <?php include "./inc/agent-listings.php"; ?>
     </div>

     <!-- Footer -->
      <?php include "./inc/footer.php"; ?>
   </body>
 </html>
