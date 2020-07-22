<?php
$query = "SELECT DISTINCT Property
                          FROM tbl_listings"; //Get linked properties
$result = $conn -> query($query);
$associated_properties = "";
while ($property = $result -> fetch_row()){ //Add to string 'array'
  $associated_properties .= "{$property[0]},";
}
$associated_properties = rtrim($associated_properties,',') //Remove tailing comma
?>


<div class="sidebar">
  <h3>Select Existing Property:</h3>
  <form class="form" method="post">
    <select class="form-field" name="add-property" size="10" required>
      <?php
        //Get all unlinked properties
        $query = "SELECT *
                  FROM tbl_properties
                  WHERE tbl_properties.PID not in ({$associated_properties})";
        $all_properties = []; //Empty Array
        $query_result = $conn -> query($query); //Get items

        while($item = $query_result-> fetch_assoc()){ //Iterate through items
          $all_properties[] = $item; //Append to array
        }

        foreach($all_properties as $p){ //Display Unlinked Properties as Options
          echo "<option value=\"{$p['PID']}\">{$p['Address']}</option>";
        }
      ?>
    </select>

    <input type="submit" class="submit" name="property-submit" value="Load Listing">

  </form>
</div>
