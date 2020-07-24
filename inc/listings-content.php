<?php
//Note:
//get_from_table has not been used due to the requirement of an INNER JOIN

//Build Query
$listings_query = "SELECT *
                   FROM tbl_listings
                   INNER JOIN tbl_properties
                   ON tbl_listings.Property = tbl_properties.PID
                   WHERE tbl_listings.Sold = false ";

//Search - Build Search Criteria
if(isset($_GET['search-submit'])){
  //Get Fields
  $search_field = secure($_GET['search-bar']);

  $price_range = [secure($_GET['min-price']),secure($_GET['max-price'])];
  $bedrooms_range = [secure($_GET['min-bedrooms']),secure($_GET['max-bedrooms'])];
  $bathrooms_range = [secure($_GET['min-bathrooms']),secure($_GET['max-bathrooms'])];

  //Set Price Criteria
  $price_criteria = get_search_criteria($price_range,'tbl_listings.Price');

  //Set Bedrooms Criteria
  $bedrooms_criteria = get_search_criteria($bedrooms_range,'tbl_properties.Bedrooms');

  //Set Bathrooms Criteria
  $bathrooms_criteria = get_search_criteria($bathrooms_range,'tbl_properties.Bathrooms');

  //Append search criteria to query
  $listings_query .= "AND (tbl_listings.Title LIKE '%{$search_field}%' OR
                            tbl_properties.Address LIKE '%{$search_field}%' OR
                            tbl_properties.Suburb LIKE '%{$search_field}%')
                            {$price_criteria}
                            {$bedrooms_criteria}
                            {$bathrooms_criteria} ";
}


//Sort - Build Sort Criteria
if(isset($_GET['sort-submit'])){
  //Get Fields
  $sort_field = secure($_GET['sort_field']);
  $sort_direction = secure($_GET['sort_direction']);

  //Add to query
  $listings_query .= "ORDER BY {$sort_field} {$sort_direction} ";
}

//Run Query
$result = $conn -> query($listings_query);
$listings = []; //Empty Array
while($listing = $result -> fetch_assoc()){
  //Get listing as assoc array and add to $listings
  $listings[] = $listing;
}
?>

<div class="listings-content column">
  <div class="listings-items row">
    <?php
    if(empty($listings)){ //If No Results
      echo 'No Results Matching ... Check your search critera and try again.';
    }

    else{
      //Display Listings
      foreach($listings as $listing){
        display_listing_card($listing); //Display Listings
      }
    }
     ?>
  </div>
</div>
