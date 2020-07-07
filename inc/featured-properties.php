<div class="featured">

  <h1>Featured Properties</h1>
  <div class="featured-slideshow">
    <!-- Temporary automatic slideshow of property images -->
    <div class="slider-featured">
      <?php
      //Echo 3 properties
        $properties = get_featured_properties(); //Get array of assoc arrays
        for($index = 0; $index < sizeof($properties); $index++){
          display_featured_property($properties,$index); //Echo each property
        }
       ?>
    </div>
  </div>
</div>
