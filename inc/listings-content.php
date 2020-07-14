<div class="listings-content column">
  <div class="listings-items row">
    <?php
    //Note:
    //get_from_table has not been used due to the requirement of an INNER JOIN

    //Build Query
    $listings_query = "SELECT *
                       FROM tbl_listings
                       INNER JOIN tbl_properties
                       ON tbl_listings.Property = tbl_properties.PID
                       WHERE tbl_listings.Sold = false ";

    //Search
    if(isset($_GET['search-submit'])){
      $search_field = $_GET['search-bar'];

      $price_range = [$_GET['min-price'],$_GET['max-price']];
      $bedrooms_range = [$_GET['min-bedrooms'],$_GET['max-bedrooms']];
      $bathrooms_range = [$_GET['min-bathrooms'],$_GET['max-bathrooms']];

      //As no wildcard for int eg. BETWEEN % and 5 if statements are required to
      //determine greater than, less than, or between

      //Set Price Criteria
      if ($price_range[0] == '' and $price_range[1] == ''){
        $price_criteria = '';
      }
      elseif ($price_range[0] == ''){ //If min is not set
        $price_criteria = "AND tbl_listings.Price <= {$price_range[1]}";
      }
      elseif ($price_range[1] == ''){ //If max is not set
        $price_criteria = "AND tbl_listings.Price >= {$price_range[0]}";
      }
      else{
        $price_criteria = "AND tbl_listings.Price BETWEEN {$price_range[0]} and {$price_range[1]}";
      }


      //Set Bedrooms Criteria
      if ($bedrooms_range[0] == '' and $bedrooms_range[1] == ''){
        $bedrooms_criteria = '';
      }
      elseif ($bedrooms_range[0] == ''){ //If min is not set
        $bedrooms_criteria = "AND tbl_properties.Bedrooms <= {$bedrooms_range[1]}";
      }
      elseif ($bedrooms_range[1] == ''){ //If max is not set
        $bedrooms_criteria = "AND tbl_properties.Bedrooms >= {$bedrooms_range[0]}";
      }
      else{
        $bedrooms_criteria = "AND tbl_properties.Bedrooms BETWEEN {$bedrooms_range[0]} and {$bedrooms_range[1]}";
      }


      //Set Bathrooms Criteria
      if ($bathrooms_range[0] == '' and $bathrooms_range[1] == ''){
        $bathrooms_criteria = '';
      }
      elseif ($bathrooms_range[0] == ''){ //If min is not set
        $bathrooms_criteria = "AND tbl_properties.Bathrooms <= {$bathrooms_range[1]}";
      }
      elseif ($bathrooms_range[1] == ''){ //If max is not set
        $bathrooms_criteria = "AND tbl_properties.Bathrooms >= {$bathrooms_range[0]}";
      }
      else{
        $bathrooms_criteria = "AND tbl_properties.Bathrooms BETWEEN {$bathrooms_range[0]} and {$bathrooms_range[1]}";
      }


      $listings_query .= "AND (tbl_listings.Title LIKE '%{$search_field}%' OR
                                tbl_properties.Address LIKE '%{$search_field}%' OR
                                tbl_properties.Suburb LIKE '%{$search_field}%')
                                {$price_criteria}
                                {$bedrooms_criteria}
                                {$bathrooms_criteria} ";
    }

    //Sort
    if(isset($_GET['sort-submit'])){
      $sort_field = $_GET['sort_field']; //Get sort information
      $sort_direction = $_GET['sort_direction'];

      //Add to query
      $listings_query .= "ORDER BY {$sort_field} {$sort_direction} ";
    }

    //Run Query
    $result = $conn -> query($listings_query);
    $listings = [];
    while($listing = $result -> fetch_assoc()){
      $listings[] = $listing;
    }

    if(empty($listings)){
      echo 'No Results Matching ... Check your search critera and try again.';
    }
    //Display Listings
    foreach($listings as $listing){
      display_listing_card($listing); //Display Listings
    }
     ?>
  </div>
</div>
