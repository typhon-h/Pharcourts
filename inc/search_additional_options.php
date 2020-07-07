<option value="" selected>Any</option>
<?php
  $values_count = 10; //Number of Options
  $increment = 1; //Increment of each option (starting at 1)

  if ($option == 'Price'){
    $increment = 100000; //Increment for price as different scale
  }

  for($value = $increment; $value<=$values_count*$increment;$value+=$increment){
    //Inline if - if price then add $ and number formatting
    //Else normal number
    echo "
          <option value=\"{$value}\">".
            (($option == 'Price')? "$".number_format($value):$value)
          ."</option>";
  }

   ?>
