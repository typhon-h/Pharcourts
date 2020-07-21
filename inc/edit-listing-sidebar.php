<div class="sidebar">
  <h3>Select Listing:</h3>
  <form class="form" method="post">
    <select class="form-field" name="edit-listing" size="2" required>
      <?php
        $all_properties = get_from_table('tbl_properties',1,'tbl_properties.Address');
        foreach($all_properties as $property){
          echo "<option value=\"{$property['PID']}\">{$property['Address']}</option>";
        }
      ?>
    </select>

    <input type="submit" class="submit" name="edit-submit" value="Load Listing">

  </form>
</div>