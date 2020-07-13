<div class="listings-content column">
  <div class="listings-items row">
    <?php
      $all_listings = get_from_table("tbl_listings","tbl_listings.Sold = false");
      foreach($all_listings as $listing){
        $property = get_from_table("tbl_properties","tbl_properties.PID = {$listing['Property']}"); //Property Info for Listing
        $listing = array_merge($listing,$property[0]); //Inner Join

        display_listing_card($listing); //Display Listings
      }
     ?>
  </div>
</div>
