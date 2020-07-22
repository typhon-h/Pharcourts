<!DOCTYPE html>
 <html lang="en">
   <!-- Head content -->
   <?php
     include "./inc/head.php";
     if(isset($_GET['AID'])){ //Only load page if agent ID is given
       $ID = $_GET['AID']; //Get Listing ID
       $agent = get_from_table("tbl_agents","tbl_agents.AID = {$ID}")[0];
     }
     else{ //Redirect to agents page if agent not given
       header("Location: ./agents.php");
     }

   ?>

   <body id="body">

     <!-- Navigation -->
     <?php include "./inc/nav.php"; ?>

     <!-- Title Section -->
     <?php include "./inc/title.php"; ?>

     <div class="content column">
       <!-- Display Agent Information -->
       <?php include "./inc/agent-info.php" ?>
       <hr class="solid">
       <!-- Display Agent Listings -->
      <?php include "./inc/agent-listings.php"; ?>
     </div>

     <!-- Footer -->
      <?php include "./inc/footer.php"; ?>
   </body>
 </html>
