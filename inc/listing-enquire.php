<div class="listing-agent column">
  <?php
    //Get attached agent
    $agent = get_from_table('tbl_agents',"tbl_agents.AID = {$listing['Agent']}")[0];

    //Display Agent Card
    display_agent_card($agent);
    
    //Display Contact Form
    include "./inc/contact-form.php";
  ?>
</div>
