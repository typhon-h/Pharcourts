<div class="info-cards row">
  <?php
    $all_agents = get_from_table('tbl_agents');

    foreach($all_agents as $agent){
      display_agent_card($agent);
    }
   ?>
</div>
