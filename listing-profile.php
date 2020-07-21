<!DOCTYPE html>
 <html lang="en">
   <!-- Head content -->
   <?php
     include "./inc/head.php";
     if(isset($_GET['LID'])){ //Only allow load page if navigated to from agent card
       $ID = $_GET['LID'];
       $listing = get_from_table("tbl_listings","tbl_listings.LID = {$ID}")[0];

      //PHP level Inner Join ON tbl_listings.Property = tbl_properties.PID
       $property = get_from_table("tbl_properties","tbl_properties.PID = {$listing['Property']}")[0];
       $listing = array_merge($listing,$property);
     }

     else{ //Redirect to listings
       header("Location: ./listings.php");
     }

   ?>

   <body id="body">

     <!-- Navigation -->
     <?php include "./inc/nav.php"; ?>

     <!-- Title Section -->
     <?php include "./inc/title.php"; ?>

     <div class="content column">
       <div class="property-image">
         <img src="./media/properties/<?php echo $listing['PID'] ?>.jpg" alt="<?php echo $listing['Address'] ?>">
       </div>

       <div class="listing-profile-content row">
         <?php include "./inc/listing-details.php"; ?>
         <?php include "./inc/listing-enquire.php"; ?>
       </div>
     </div>

     <!-- Footer -->
      <?php include "./inc/footer.php"; ?>
   </body>
 </html>
