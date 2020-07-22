<div class="listing-info">
  <h1><?php echo $listing['Title']; ?></h1>

  <p><?php echo $listing['Description']; ?></p>

  <div class="listing-important-info">
    <h1>Details</h1>
    <ul>
      <?php
        // Fields to include in details
        $fields_to_display = ['AuctionDate','Bedrooms','Bathrooms','Toilets','GarageSpaces','Size','Year','Construction','PCondition','Insulation']; //Fields to show in details

        $listing['Size'] .= " sqm"; //Add unit to size

        foreach ($fields_to_display as $field){
          $value = $listing[$field]; //Get field value

          switch ($field) { //Tidy up display name for specific fields
            case 'PCondition':
              $field = 'Property Condition';
              break;

            case 'GarageSpaces':
              $field = 'Garage Spaces';
              break;

            case 'AuctionDate':
              $field = 'Auction Date';
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
