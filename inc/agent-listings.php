
<?php
if (isset($_POST['switch-listings'])){
  $current_state = secure($_POST['switch-state']);
  if($current_state == "Active"){ //Switch values around
    $switch_state = "Sold";
  }
  else{
    $switch_state = "Active";
  }
}

if(!isset($current_state) || !isset($switch_state)){ //Set Default values
  $current_state = "Active";
  $switch_state = "Sold";
}
 ?>

<div class="listings-heading column">
  <h1>My <?php echo $current_state ?> Listings</h1>
  <form method="post">
    <input type="text" name="switch-state" value="<?php echo $switch_state; ?>" hidden>

    <input type="submit" class="form-field" name="switch-listings" value="View <?php echo $switch_state ?> Listings">
  </form>
</div>

<div class="listings-items row">
  <?php
  $listings_query = "SELECT *
                     FROM tbl_listings
                     INNER JOIN tbl_properties
                     ON tbl_listings.Property = tbl_properties.PID
                     WHERE tbl_listings.Sold = ".(($current_state == "Active")? 0:1)."
                        AND tbl_listings.Agent = {$agent['AID']}";
  //Run Query
  $result = $conn -> query($listings_query);
  $listings = [];
  while($listing = $result -> fetch_assoc()){
    $listings[] = $listing;
  }

  if(empty($listings)){
    echo "No {$current_state} Listings";
  }
  //Display Listings
  foreach($listings as $listing){
    display_listing_card($listing); //Display Listings
  }
   ?>
</div>
