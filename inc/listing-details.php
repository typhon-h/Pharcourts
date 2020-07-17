<div class="listing-info">
  <h1><?php echo $listing['Title']; ?></h1>

  <p><?php echo $listing['Description']; ?></p>

  <div class="listing-important-info">
    <h1>Details</h1>
    <ul>
      <?php
        $fields_to_display = ['Bedrooms','Bathrooms','Toilets','GarageSpaces','Size','Year','Construction','PCondition','Insulation']; //Fields to show in details

        $listing['Size'] .= " sqm"; //Add unit to size

        foreach ($fields_to_display as $field){
          $value = $listing[$field];

          switch ($field) { //Tidy up display for specific fields
            case 'PCondition':
              $field = 'Property Condition';
              break;

            case 'GarageSpaces':
              $field = 'Garage Spaces';
              break;
          }
          //Display Field Information
          echo "<li>
                  <b>{$field}:</b> {$value}
                </li>";
        }
       ?>
    </ul>
  </div>


</div>
