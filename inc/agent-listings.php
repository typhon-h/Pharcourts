
<?php
if (isset($_POST['switch-listings'])){ //Button to switch active and sold listings
  $current_state = secure($_POST['switch-state']); //Swap current state
  if($current_state == "Active"){ //Swap alternate state
    $switch_state = "Sold";
  }
  else{
    $switch_state = "Active";
  }
}

if(!isset($current_state) || !isset($switch_state)){ //Set Default values if button not pressed or on intial page load
  $current_state = "Active";
  $switch_state = "Sold";
}
 ?>

<div class="listings-heading column">
  <h1>My <?php echo $current_state ?> Listings</h1>
  <form method="post">
    <!-- Listings to switch to when button pressed -->
    <input type="text" name="switch-state" value="<?php echo $switch_state; ?>" hidden>

    <!-- Button text changes to alternate state -->
    <input type="submit" class="form-field" name="switch-listings" value="View <?php echo $switch_state ?> Listings">
  </form>
</div>

<div class="listings-items row">
  <?php
  //Query listings
  //If active properties then WHERE Sold = 0.
  //If sold properties then WHERE Sold = 1.
  $listings_query = "SELECT *
                     FROM tbl_listings
                     INNER JOIN tbl_properties
                     ON tbl_listings.Property = tbl_properties.PID
                     WHERE tbl_listings.Sold = ".(($current_state == "Active")? 0:1)."
                        AND tbl_listings.Agent = {$agent['AID']}";
  //Run Query
  $result = $conn -> query($listings_query);
  $listings = []; //Empty array
  while($listing = $result -> fetch_assoc()){
    //Add listings as assoc array to array
    $listings[] = $listing;
  }

  if(empty($listings)){ //If no results
    echo "No {$current_state} Listings";
  }

  else{
    //Display Listings
    foreach($listings as $listing){
      display_listing_card($listing); //Display Listings
    }
  }
   ?>
</div>
