<div class="featured column">
  <h1>Featured Properties</h1>
  <div class="featured-slideshow row">
    <!-- Temporary automatic slideshow of property images -->
    <div class="slider-featured">
      <?php
        //Echo 3 properties
        $query = "SELECT *
                  FROM tbl_listings
                  INNER JOIN tbl_properties
                    ON tbl_listings.Property=tbl_properties.PID
                  WHERE tbl_properties.PCondition = 'Excellent'
                  ORDER BY tbl_listings.Title ASC
                  LIMIT 3"; //Get max of 3 'Excellent' properties to be featured
                            //Potentially add 'featured' column to database in future?
        $result = $conn -> query($query);
        $featured_properties = []; //Empty Array

        while($property = $result-> fetch_assoc()){ //Iterate through properties
          $featured_properties[] = $property; //Append to array
        }
          foreach($featured_properties as $property){
          display_featured_property($property); //Echo each property
        }
       ?>
    </div>
  </div>
</div>
