
<form class="form column" method="post" enctype="multipart/form-data">
  <input type="text" name="PID" value="<?php echo ((isset($listing))? $listing['PID']: NULL) ?>" hidden>
  <input type="text" name="LID" value="<?php echo ((isset($listing))? $listing['LID']: NULL) ?>" hidden>


  <!-- Listing Fields -->
  <div class="row">
    <input class="form-field" type="text" name="listing-title" placeholder="Title" required <?php echo ((isset($listing))? "value=\"{$listing['Title']}\"":'disabled'); ?>>
  </div>

  <div class="row">
    <textarea class="form-field textarea" name="listing-description" placeholder="Description..." required <?php echo ((isset($listing))? ">{$listing['Description']}":'disabled>'); ?></textarea>
  </div>

  <div class="row">
    <input class="form-field" type="number" name="listing-price" placeholder="Price" required <?php echo ((isset($listing))? "value=\"{$listing['Price']}\"":'disabled'); ?>>

      <input class="form-field" type="text" name="listing-auction-date" placeholder="Auction Date: YYYY-MM-DD" title="Auction Date YYYY-MM-DD" pattern="^\d{4}-\d{1,2}-\d{1,2}$" required <?php echo ((isset($listing))? "value=\"{$listing['AuctionDate']}\"":'disabled'); ?>>
  </div>

  <div class="row">
    <select class="form-field" name="listing-agent" required <?php echo ((isset($listing))? '>':'disabled> <option selected>Agent...</option>'); ?>
      <?php
        $all_agents = get_from_table('tbl_agents',1,'tbl_agents.FName');
        foreach($all_agents as $agent){
          echo "<option ".(($agent['AID'] == $listing['Agent'])? 'selected':NULL)." value=\"{$agent['AID']}\">{$agent['FName']} {$agent['SName']}</option>";
        }
      ?>
    </select>
  </div>

  <!-- Property Fields -->
  <div class="row">
    <!-- regex Address must be number followed by at least two words -->
    <input class="form-field" type="text" name="listing-address" placeholder="Address..." title="Address eg. 123 Main Street" pattern="^\d+(\s[A-z]+){2,}" required <?php echo ((isset($listing))? "value=\"{$listing['Address']}\"":'disabled'); ?>>

    <!-- regex Suburb between 1 and 3 words -->
    <input class="form-field" type="text" name="listing-suburb" placeholder="Suburb..." title="Suburb eg. Redwood" pattern="^(\w+\s?){1,3}"required <?php echo ((isset($listing))? "value=\"{$listing['Suburb']}\"":'disabled'); ?>>
  </div>

  <div class="row">
    <!-- Regex All Fields require 0-99 integer -->
    <input class="form-field" type="text" name="listing-bedrooms" placeholder="Bedrooms..." title="Bedrooms 0-99" pattern = "^([0-9]|[1-8][0-9]|9[0-9])$" required <?php echo ((isset($listing))? "value=\"{$listing['Bedrooms']}\"":'disabled'); ?>>

    <input class="form-field" type="text" name="listing-bathrooms" placeholder="Bathrooms..." title="Bathrooms 0-99" pattern = "^([0-9]|[1-8][0-9]|9[0-9])$" required <?php echo ((isset($listing))? "value=\"{$listing['Bathrooms']}\"":'disabled'); ?>>

    <input class="form-field" type="text" name="listing-toilets" placeholder="Toilets..." title="Toilets 0-99" pattern = "^([0-9]|[1-8][0-9]|9[0-9])$" required <?php echo ((isset($listing))? "value=\"{$listing['Toilets']}\"":'disabled'); ?>>

    <input class="form-field" type="text" name="listing-garage-spaces" placeholder="Garage Spaces..." title="Garage Spaces 0-99" pattern = "^([0-9]|[1-8][0-9]|9[0-9])$" required <?php echo ((isset($listing))? "value=\"{$listing['GarageSpaces']}\"":'disabled'); ?>>
  </div>

  <div class="row">
    <!-- Regex number in range 1-32767 (smallint size) -->
    <input class="form-field" type="number" name="listing-size" placeholder="Size(sqm)..." title="Size(sqm) eg. 598" pattern="^([1-9]|[1-8][0-9]|9[0-9]|[1-8][0-9]{2}|9[0-8][0-9]|99[0-9]|[1-8][0-9]{3}|9[0-8][0-9]{2}|99[0-8][0-9]|999[0-9]|[12][0-9]{4}|3[01][0-9]{3}|32[0-6][0-9]{2}|327[0-5][0-9]|3276[0-7])$" required <?php echo ((isset($listing))? "value=\"{$listing['Size']}\"":'disabled'); ?>>

    <!-- Regex 4 digit number -->
    <input class="form-field" type="text" name="listing-year" placeholder="Year..." title="Year eg. 1999" pattern="^\d{4}$" required <?php echo ((isset($listing))? "value=\"{$listing['Year']}\"":'disabled'); ?>>

    <input class="form-field" type="text" name="listing-construction" placeholder="Construction..." title="Construction eg. Brick" required <?php echo ((isset($listing))? "value=\"{$listing['Construction']}\"":'disabled'); ?>>
  </div>

  <div class="row">
    <select class="form-field" name="listing-condition" required <?php echo ((isset($listing))? ">":'disabled> <option selected>Property Condition</option>'); ?>
      <?php
        $options = ['Poor', 'Fair', 'Good', 'Excellent', 'New'];
        foreach($options as $option){
          echo "<option ".(($option == $listing['PCondition'])? 'selected':NULL)." value=\"{$option}\">{$option}</option>";
        }
       ?>
    </select>

    <input class="form-field" type="text" name="listing-insulation" placeholder="Insulation..." title="Insulation eg. Roof, Walls"<?php echo ((isset($listing))? "value=\"{$listing['Insulation']}\"":'disabled'); ?>>
  </div>

  <div class="row">
    <label for="listing-image">Change Property Image: <br> Required File Type: .png | Required Aspect Ratio: 2:1</label>
    <input type="file" name="listing-image" <?php echo ((isset($listing))? NULL:'disabled'); ?>>
  </div>

  <div class="row">
    <input class="submit" type="submit" name="listing-delete" value = "Delete" <?php echo ((isset($listing))? NULL:'disabled'); ?>>

    <input class="submit" type="submit" name="listing-update" value = "Update" <?php echo ((isset($listing))? NULL:'disabled'); ?>>
  </div>
</form>