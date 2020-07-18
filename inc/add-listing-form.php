
<form class="form column" action"./inc/add-listing-validation" method="post" enctype="multipart/form-data">

  <div class="row">
    <input class="form-field" type="text" name="listing-title" placeholder="Title" required>
  </div>

  <div class="row">
    <textarea class="form-field textarea" name="listing-description" placeholder="Description..." required></textarea>
  </div>

  <div class="row">
    <input class="form-field" type="number" name="listing-price" placeholder="Price" required>

      <input class="form-field" type="text" name="listing-auction-date" placeholder="Auction Date: YYYY-MM-DD" title="Auction Date YYYY-MM-DD" pattern="^\d{4}-\d{1,2}-\d{1,2}$" required>
  </div>

  <div class="row">
    <select class="form-field" name="listing-agent" required>
      <option value="" selected disabled>Select Agent...</option>
      <?php
        $all_agents = get_from_table('tbl_agents',1,'tbl_agents.FName');
        foreach($all_agents as $agent){
          echo "<option value=\"{$agent['AID']}\">{$agent['FName']} {$agent['SName']}</option>";
        }
      ?>
    </select>
  </div>

  <div class="row">
    <!-- regex Address must be number followed by at least two words -->
    <input class="form-field" type="text" name="listing-address" placeholder="Address..." title="Address eg. 123 Main Street" pattern="^\d+(\s[A-z]+){2,}" required>

    <!-- regex Suburb between 1 and 3 words -->
    <input class="form-field" type="text" name="listing-suburb" placeholder="Suburb..." title="Suburb eg. Redwood" pattern="^(\w+\s?){1,3}"required>
  </div>

  <div class="row">
    <!-- Regex All Fields require 0-99 integer -->
    <input class="form-field" type="number" name="listing-bedrooms" placeholder="Bedrooms..." title="Bedrooms 0-99" pattern = "^([0-9]|[1-8][0-9]|9[0-9])$" required>

    <input class="form-field" type="number" name="listing-bathrooms" placeholder="Bathrooms..." title="Bathrooms 0-99" pattern = "^([0-9]|[1-8][0-9]|9[0-9])$" required>

    <input class="form-field" type="number" name="listing-toilets" placeholder="Toilets..." title="Toilets 0-99" pattern = "^([0-9]|[1-8][0-9]|9[0-9])$" required>

    <input class="form-field" type="number" name="listing-garage-Spaces" placeholder="Garage Spaces..." title="Garage Spaces 0-99" pattern = "^([0-9]|[1-8][0-9]|9[0-9])$" required>
  </div>

  <div class="row">
    <input class="form-field" type="number" name="listing-size" placeholder="Size..." title="Size(sqm) eg. 598"required>

    <!-- Regex 4 digit number -->
    <input class="form-field" type="number" name="listing-year" placeholder="Year..." title="Year eg. 1999" pattern="^\d{4}$" required>

    <input class="form-field" type="text" name="listing-construction" placeholder="Construction..." title="Construction eg. Brick" required>
  </div>

  <div class="row">
    <select class="form-field" name="listing-condition" required>
      <option value="" selected disabled>Property Condition...</option>
      <option value="Poor">Poor</option>
      <option value="Fair">Fair</option>
      <option value="Good">Good</option>
      <option value="Excellent">Excellent</option>
      <option value="New">New</option>
    </select>

    <input class="form-field" type="text" name="listing-insulation" placeholder="Insulation..." title="Insulation eg. Roof, Walls">
  </div>

  <div class="row">
    <input type="file" name="listing-image" required>
  </div>

  <input class="submit" type="submit" name="contact-submit">
</form>
