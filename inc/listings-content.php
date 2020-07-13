<div class="listings-content column">
  <div class="listings-items row">
    <?php
    //Note:
    //get_from_table has not been used due to the requirement of an INNER JOIN

    //Build Query
    $listings_query = "SELECT *
                       FROM tbl_listings
                       INNER JOIN tbl_properties
                       ON tbl_listings.Property = tbl_properties.PID ";

    if(isset($_GET['sort_submit'])){ //If sort button pressed
      $sort_field = $_GET['sort_field']; //Get sort information
      $sort_direction = $_GET['sort_direction'];
      //Add to query
      $listings_query .= "ORDER BY {$sort_field} {$sort_direction}";
    }


    //Run Query
    $result = $conn -> query($listings_query);
    $listings = [];
    while($listing = $result -> fetch_assoc()){
      $listings[] = $listing;
    }


    //Display Listings
    foreach($listings as $listing){

      display_listing_card($listing); //Display Listings
    }
     ?>
  </div>
</div>
