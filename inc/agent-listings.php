


<h1>My Active Listings</h1>







<div class="listings-items row">
  <?php
  $listings_query = "SELECT *
                     FROM tbl_listings
                     INNER JOIN tbl_properties
                     ON tbl_listings.Property = tbl_properties.PID
                     WHERE tbl_listings.Sold = false
                        AND tbl_listings.Agent = {$agent['AID']}";
  //Run Query
  $result = $conn -> query($listings_query);
  $listings = [];
  while($listing = $result -> fetch_assoc()){
    $listings[] = $listing;
  }

  if(empty($listings)){
    echo 'No Active Listings';
  }
  //Display Listings
  foreach($listings as $listing){
    display_listing_card($listing); //Display Listings
  }
   ?>
</div>
