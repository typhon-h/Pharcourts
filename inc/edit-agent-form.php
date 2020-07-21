
<form class="form column" method="post" enctype="multipart/form-data">
  <input type="text" name="AID" value="<?php echo ((isset($active_agent))? $active_agent['AID']:NULL) ?>" hidden>

  <!-- Agent Fields -->
  <div class="row">
    <input class="form-field" type="text" name="agent-fname" placeholder="First Name..." required <?php echo ((isset($active_agent))? "value=\"{$active_agent['FName']}\"":'disabled'); ?>>

    <input class="form-field" type="text" name="agent-sname" placeholder="Last Name..." required <?php echo ((isset($active_agent))? "value=\"{$active_agent['SName']}\"":'disabled'); ?>>
  </div>


  <div class="row">
    <input class="form-field" type="text" name="agent-qualification" placeholder="Qualification" required <?php echo ((isset($active_agent))? "value=\"{$active_agent['Qualification']}\"":'disabled'); ?>>
  </div>


  <div class="row">
    <!-- Regex for mobile phone number +64 12 345 6789-->
    <input class="form-field" type="tel" name="agent-mobileph" placeholder="Mobile Phone Num..." title="Mobile Number eg. +64 12 345 6789" pattern = "^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" required <?php echo ((isset($active_agent))? "value=\"{$active_agent['MobilePh']}\"":'disabled'); ?>>

    <!-- Regex for office phone number 03 1234567-->
    <input class="form-field" type="tel" name="agent-workph" placeholder="Office Phone Num..." title="Office Phone Number eg. 03 123 4567" pattern="^\d{2}[\s|-]\d{3}[\s|-]\d{4}$" required <?php echo ((isset($active_agent))? "value=\"{$active_agent['WorkPh']}\"":'disabled'); ?>>

    <input class="form-field" type="email" name="agent-email" placeholder="Email..." required <?php echo ((isset($active_agent))? "value=\"{$active_agent['Email']}\"":'disabled'); ?>>
  </div>


  <div class="row">
    <textarea class="form-field textarea" name="agent-bio" placeholder="Bio..." required <?php echo ((isset($active_agent))? ">{$active_agent['Bio']}":'disabled>'); ?></textarea>
  </div>


  <div class="row">
    <label for="agent-image">Change Profile Picture: <br> Required File Type: .jpg | Required Aspect Ratio: 1:1</label>
    <input type="file" name="agent-image" <?php echo ((isset($active_agent))? NULL:'disabled'); ?>>
  </div>


  <div class="row">
      <input class="submit" type="submit" value="Delete" name="agent-delete" <?php echo ((isset($active_agent))? NULL:'disabled'); ?>>

      <input class="submit" type="submit" value="Update" name="agent-update" <?php echo ((isset($active_agent))? NULL:'disabled'); ?>>
  </div>
</form>
