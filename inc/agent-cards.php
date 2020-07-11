<div class="info-cards row">
  <?php
    $all_agents = get_all_agents();

    foreach($all_agents as $agent){
      display_agent_card($agent);
    }
   ?>
</div>
