<!-- Search Form -->
<form name="listings-search" class="search-form column" method="get" action="./listings.php">
  <!-- Always visible -->
  <div class="search-items row">
    <input name = "search-bar" type="text" placeholder="Search..." autocomplete="off" autofocus>
    <input name = "search-submit" type="submit" value="Search">
  </div>

  <!-- Toggle for additional dropdown options -->
  <label class="option-toggle"for="option-toggle">More Options &#9650; &#9660;</label> <!-- Change arrow direciton based on toggle state (javascript necessary) -->
  <input type="checkbox" id="option-toggle" name="option-toggle" value="" hidden>


  <div class="additional-options row"> <!-- Additional dropdown options -->
    <?php
      //Additional Search Fields
      $options = array("Price", "Bedrooms", "Bathrooms");

      foreach($options as $option){
        //Echo statement is broken as requires include statement to import options for select fields
        echo "
              <div class=\"additional-option column\">
                <label>{$option}</label>
                <div class=\"additional-selects row\">
                  <label for=\"min-". strtolower($option) ."\">Min:</label>
                  <select name=\"min-". strtolower($option) ."\" id=\"min-". strtolower($option) ."\">";
                    include './inc/listings-search-additional-options.php';
        echo "
                  </select>
                  <label for=\"max-". strtolower($option) ."\">Max:</label>
                  <select name=\"max-". strtolower($option) ."\" id=\"max-". strtolower($option) ."\">";
                  include './inc/listings-search-additional-options.php';
        echo "
                  </select>
                </div>
              </div>";
      }
   ?>
  </div>
</form>
