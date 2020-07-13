<?php
//Function Definitions
declare(strict_types=1); // All variables must be the declared type

function get_featured_properties(){
  global $conn;
  $query = "SELECT tbl_listings.Title,
                   tbl_listings.AuctionDate,
                   tbl_properties.PCondition,
                   tbl_properties.Suburb,
                   tbl_properties.Bedrooms,
                   tbl_properties.Bathrooms,
                   tbl_properties.GarageSpaces,
                   tbl_properties.Toilets,
                   tbl_properties.PID
            FROM tbl_listings
            INNER JOIN tbl_properties
              ON tbl_listings.Property=tbl_properties.PID
            WHERE tbl_properties.PCondition = 'Excellent'
            ORDER BY tbl_listings.Title ASC
            LIMIT 3"; //Get max of 3 'Excellent' properties to be featured
                      //Potentially add 'featured' column to database

  $result = $conn -> query($query);
  $featured_properties = []; //Empty Array

  while($property = $result-> fetch_assoc()){ //Iterate through properties
    $featured_properties[] = $property; //Append to array
  }

  return $featured_properties; //Return array with all properties

}


function display_featured_property($property){

  //Display property slide
  echo "
        <div class=\"featured-property column\">
          <div class=\"house-info column\">
            <h2>{$property['Title']}</h2>
            <h4>{$property['Suburb']}</h4>
            <h4>Auction Date:</h4>
            <h3>".format_date($property['AuctionDate'])."</h3>

            <ul>
              <li>Bathrooms: <span class=\"quantity\">{$property['Bathrooms']}</span></li>
              <li>Toilets: <span class=\"quantity\">{$property['Toilets']}</span></li>
              <li>Garage Spaces: <span class=\"quantity\">{$property['GarageSpaces']}</span></li>
             </ul>

            <a href=\"#\">Learn More &#8594;</a> <!-- Right Arrow -->
          </div>

          <div class=\"house-img row\">
            <img src=\"./media/properties/{$property['PID']}.png\" alt=\"Property Image\">
          </div>
        </div>
      ";
  return;
}


function format_date($date){ //Date in format YYYY-MM-DD
  list($year, $month, $day) = explode('-',$date);
  $new_date = "{$day}/{$month}/{$year}"; //Convert to DD/MM/YYYY
  return $new_date; //Return reformatted date
}


function get_active_page(){ //Get active page as 'example' instead of '/pharcourts/example.php'
  $address = $_SERVER['PHP_SELF']; // Get as /pharcourts/example.php
  $components = explode('/', $address); //Get as array
  return str_replace('.php', '', end($components)); //Return last element
}


function get_from_table($table_name,$condition=1){
  global $conn;
  $query = "SELECT *
            FROM {$table_name}
            WHERE {$condition}";
  $results = []; //Empty Array

  $query_result = $conn -> query($query); //Get items

  while($item = $query_result-> fetch_assoc()){ //Iterate through items
    $results[] = $item; //Append to array
  }

  return $results;
}


function display_agent_card($agent){
  echo "
        <div class=\"card column\">
          <div class=\"card-head column\" style=\"background-image:url('./media/agents/{$agent['AID']}.png');\">
            <h3>{$agent['FName']} {$agent['SName']}</h3>
          </div>
          <div class=\"card-body column\">
            <p><i>{$agent['Qualification']}</i></p>

            <div class=\"contact-details column\">
              <b>Contact:</b>
              <p>Office Phone: <a href=\"tel:{$agent['WorkPh']}\">{$agent['WorkPh']}</a></p>
              <p>Mobile Phone: <a href=\"tel:{$agent['MobilePh']}\">{$agent['MobilePh']}</a></p>
              <p>Email: <a href=\"mailto:{$agent['Email']}\">{$agent['Email']}</a></p>
            </div>

            <a href=\"#\">View My Listings</a>
          </div>
        </div>";
}

 ?>
