<div class="sidebar">
  <h3>Select Listing:</h3>
  <form class="form" method="post">
    <select class="form-field" name="edit-listing" size="2" required>
      <?php
        $query = "SELECT *
                  FROM tbl_properties
                  INNER JOIN tbl_listings
                  ON tbl_properties.PID = tbl_listings.Property";
        $all_properties = []; //Empty Array
        $query_result = $conn -> query($query); //Get items

        while($item = $query_result-> fetch_assoc()){ //Iterate through items
          $all_properties[] = $item; //Append to array
        }

        foreach($all_properties as $property){
          echo "<option value=\"{$property['PID']}\">{$property['Address']}</option>";
        }
      ?>
    </select>

    <input type="submit" class="submit" name="edit-submit" value="Load Listing">

  </form>
</div>
