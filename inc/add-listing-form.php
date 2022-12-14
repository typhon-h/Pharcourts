<?php
  //Prevent assocoated property populating if page navigated back to and form resubmitted
if(isset($property)){
  $existing_property = get_from_table('tbl_listings',"tbl_listings.Property = {$property['PID']}"); //Get associated listing (if any)
  if($existing_property != ''){ //Set property to null if query returns value
    $property = NULL;
  }
}
 ?>
<form class="form column" method="post" enctype="multipart/form-data">
  <!-- Listing Fields -->
  <div class="row">
    <input class="form-field" type="text" name="listing-title" placeholder="Title" required autofocus>
  </div>

  <div class="row">
    <textarea class="form-field textarea" name="listing-description" placeholder="Description..." required></textarea>
  </div>

  <div class="row">
    <!-- Regex integer greater than 0 -->
    <input class="form-field" type="number" name="listing-price" placeholder="Price" title="Price" pattern="^[1-9]\d*$" required>

      <!-- Regex format YYYY-MM-DD -->
      <input class="form-field" type="text" name="listing-auction-date" placeholder="Auction Date: YYYY-MM-DD" title="Auction Date YYYY-MM-DD" pattern="^\d{4}-(0[1-9]|1[0-2])-([0-3][0-9])$" required>
  </div>

  <div class="row">
    <select class="form-field" name="listing-agent" required>
      <option value="" selected disabled>Select Agent...</option>
      <?php //Get all agents as options
        $all_agents = get_from_table('tbl_agents',1,'tbl_agents.FName');
        foreach($all_agents as $agent){
          echo "<option value=\"{$agent['AID']}\">{$agent['FName']} {$agent['SName']}</option>";
        }
      ?>
    </select>
  </div>

<!-- Inline if - all fields populate themselves if $property is set from the sidebar, else they are inactive -->

  <!-- Property Fields -->
  <!-- Hidden field to pass ID of Property to Validation -->
  <input type="text" name="PID" <?php echo ((isset($property))? "value=\"{$property['PID']}\"":NULL); ?> hidden>
  <div class="row">
    <!-- regex Address must be number followed by at least two words -->
    <input class="form-field" type="text" name="listing-address" placeholder="Address..." title="Address eg. 123 Main Street" pattern="^\d+(\s[A-z]+){2,}" required <?php echo "value = \"".((isset($property))? $property['Address']:NULL)."\" "; ?>>

    <!-- regex Suburb between 1 and 3 words -->
    <input class="form-field" type="text" name="listing-suburb" placeholder="Suburb..." title="Suburb eg. Redwood" pattern="^(\w+\s?){1,3}" required <?php echo "value = \"".((isset($property))? $property['Suburb']:NULL)."\" "; ?>>
  </div>

  <div class="row">
    <!-- Regex Bedrooms, Bathrooms, Toilets, GarageSpaces require 0-99 integer -->
    <input class="form-field" type="text" name="listing-bedrooms" placeholder="Bedrooms..." title="Bedrooms 0-99" pattern = "^([0-9]|[1-8][0-9]|9[0-9])$" required <?php echo "value = \"".((isset($property))? $property['Bedrooms']:NULL)."\" "; ?>>

    <input class="form-field" type="text" name="listing-bathrooms" placeholder="Bathrooms..." title="Bathrooms 0-99" pattern = "^([0-9]|[1-8][0-9]|9[0-9])$" required <?php echo "value = \"".((isset($property))? $property['Bathrooms']:NULL)."\" "; ?>>

    <input class="form-field" type="text" name="listing-toilets" placeholder="Toilets..." title="Toilets 0-99" pattern = "^([0-9]|[1-8][0-9]|9[0-9])$" required <?php echo "value = \"".((isset($property))? $property['Toilets']:NULL)."\" "; ?>>

    <input class="form-field" type="text" name="listing-garage-spaces" placeholder="Garage Spaces..." title="Garage Spaces 0-99" pattern = "^([0-9]|[1-8][0-9]|9[0-9])$" required <?php echo "value = \"".((isset($property))? $property['GarageSpaces']:NULL)."\" "; ?>>
  </div>

  <div class="row">
    <!-- Regex number in range 1-32767 (smallint maxsize) -->
    <input class="form-field" type="number" name="listing-size" placeholder="Size(sqm)..." title="Size(sqm) eg. 598" pattern="^([1-9]|[1-8][0-9]|9[0-9]|[1-8][0-9]{2}|9[0-8][0-9]|99[0-9]|[1-8][0-9]{3}|9[0-8][0-9]{2}|99[0-8][0-9]|999[0-9]|[12][0-9]{4}|3[01][0-9]{3}|32[0-6][0-9]{2}|327[0-5][0-9]|3276[0-7])$" required <?php echo "value = \"".((isset($property))? $property['Size']:NULL)."\" "; ?>>

    <!-- Regex 4 digit number -->
    <input class="form-field" type="text" name="listing-year" placeholder="Year..." title="Year eg. 1999" pattern="^\d{4}$" required <?php echo "value = \"".((isset($property))? $property['Year']:NULL)."\" "; ?>>

    <input class="form-field" type="text" name="listing-construction" placeholder="Construction..." title="Construction eg. Brick" required <?php echo "value = \"".((isset($property))? $property['Construction']:NULL)."\" "; ?>>
  </div>

  <div class="row">
    <select class="form-field" name="listing-condition" required>
      <option value="" selected disabled>Property Condition...</option>
      <?php //Populate with conditions
        $options = ['Poor', 'Fair', 'Good', 'Excellent', 'New'];
        foreach($options as $option){
          echo "<option ".(($option == $property['PCondition'])? 'selected':NULL)." value=\"{$option}\">{$option}</option>";
        }
       ?>
    </select>

    <input class="form-field" type="text" name="listing-insulation" placeholder="Insulation..." title="Insulation eg. Roof, Walls" <?php echo "value = \"".((isset($property))? $property['Insulation']:NULL)."\" "; ?>>
  </div>

  <div class="row">
    <!-- Image requirements -->
    <label for="listing-image">Select Property Image: <br> Required File Type: .jpg | Required Aspect Ratio: 2:1</label>
    <input type="file" name="listing-image" <?php echo ((isset($property))? NULL:'required'); ?>>
  </div>

  <input class="submit" type="submit" name="listing-submit">
</form>
