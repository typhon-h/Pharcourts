<div class="info-cards row">
  <?php
    //Get all agents
    $all_agents = get_from_table('tbl_agents');

    //Display card for each agent
    foreach($all_agents as $agent){
      display_agent_card($agent);
    }
   ?>
</div>
