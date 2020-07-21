<div class="sidebar">
  <h3>Select Agent:</h3>
  <form class="form" method="post">
    <select class="form-field" name="edit-agent" size="2" required>
      <?php
        $all_agents = get_from_table('tbl_agents',1,'tbl_agents.FName');
        foreach($all_agents as $agent){
          echo "<option value=\"{$agent['AID']}\">{$agent['FName']} {$agent['SName']}</option>";
        }
      ?>
    </select>

    <input type="submit" class="submit" name="edit-submit" value="Load Agent">

  </form>
</div>
