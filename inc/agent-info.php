<div class="about-info column">
  <h1>About Me</h1>
  <div class="about-section row">
    <?php echo "<img src=\"./media/agents/{$agent['AID']}.jpg\" alt=\"{$agent['FName']} {$agent['SName']}\">"; ?>
    <p>
      <?php echo $agent['Bio'];?>
    </p>
  </div>
</div>
