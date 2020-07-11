<div class="featured column">

  <h1>Featured Properties</h1>
  <div class="featured-slideshow row">
    <!-- Temporary automatic slideshow of property images -->
    <div class="slider-featured">
      <?php
      //Echo 3 properties
        $properties = get_featured_properties(); //Get array of assoc arrays
        foreach($properties as $property){
          display_featured_property($property); //Echo each property
        }
       ?>
    </div>
  </div>
</div>
