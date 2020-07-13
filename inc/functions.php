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
            <span>
              <h2>{$property['Title']}</h2>
              <h4>{$property['Suburb']}</h4>
            </span>

            <span>
              <h4>Auction Date:</h4>
              <h3>".format_date($property['AuctionDate'])."</h3>
            </span>

            <div class=\"property-details row\">
              <span class=\"property-detail\">
                <img src=\"./media/bed.png\" alt=\"Bedrooms\">
                <b>{$property['Bedrooms']}</b>
               </span>

              <span class=\"property-detail\">
                <img src=\"./media/bath.png\" alt=\"Bathrooms\">
                <b>{$property['Bathrooms']}</b>
                </span>

              <span class=\"property-detail\">
                <img src=\"./media/toilet.png\" alt=\"Toilets\">
                <b>{$property['Toilets']}</b>
              </span>

              <span class=\"property-detail\">
                <img src=\"./media/garage.png\" alt=\"Garage Spaces\">
                <b>{$property['GarageSpaces']}</b>
              </span>
            </div>

            <a href=\"#\">Learn More &#8594;</a> <!-- Right Arrow -->
          </div>

          <div class=\"house-img row\">
            <img src=\"./media/properties/{$property['PID']}.png\" alt=\"Property Image\">
          </div>
        </div>
      ";
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


function get_from_table($table_name,$condition=1,$sort=1,$sort_direction='ASC'){
  global $conn;
  $query = "SELECT *
            FROM {$table_name}
            WHERE {$condition}
            ORDER BY {$sort} {$sort_direction}";
  $results = []; //Empty Array

  $query_result = $conn -> query($query); //Get items
  while($item = $query_result-> fetch_assoc()){ //Iterate through items
    $results[] = $item; //Append to array
  }

  return $results; //Returns as array of associated arrays
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

function display_listing_card($listing){
  echo "
        <div class=\"card column\">
          <div class=\"card-head column\" style=\"background-image: url('./media/properties/{$listing['Property']}.png');\">
            <h3>{$listing['Title']}</h3>
          </div>
          <div class=\"card-body column\">
             <p>
               {$listing['Address']}
               <br>
               {$listing['Suburb']}
             </p>

             <h2>$".number_format(floatval($listing['Price']))."</h2>

             <p>
               Auction Date:
               <br>
               <b>".format_date($listing['AuctionDate'])."</b>
             </p>

             <div class=\"property-details row\">
               <span class=\"property-detail\">
                 <img src=\"./media/bed.png\" alt=\"Bedrooms\">
                 <b>{$listing['Bedrooms']}</b>
                </span>

               <span class=\"property-detail\">
                 <img src=\"./media/bath.png\" alt=\"Bathrooms\">
                 <b>{$listing['Bathrooms']}</b>
                 </span>

               <span class=\"property-detail\">
                 <img src=\"./media/toilet.png\" alt=\"Toilets\">
                 <b>{$listing['Toilets']}</b>
               </span>

               <span class=\"property-detail\">
                 <img src=\"./media/garage.png\" alt=\"Garage Spaces\">
                 <b>{$listing['GarageSpaces']}</b>
               </span>
             </div>

            <a href=\"#\">Enquire &#8594;</a>
          </div>
        </div>";
}
 ?>
