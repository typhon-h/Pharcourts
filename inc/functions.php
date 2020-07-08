<?php
//Function Definitions
declare(strict_types=1); // All variables must be the declared type

function get_featured_properties(){
  global $conn;
  $query = "SELECT tbl_listings.Title, tbl_listings.AuctionDate,
                   tbl_properties.PCondition, tbl_properties.Suburb,
                   tbl_properties.Bedrooms, tbl_properties.Bathrooms,
                   tbl_properties.GarageSpaces, tbl_properties.Toilets,
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


function display_featured_property($array,$index=0){
  //Default index is 0

  //Display property slide
  echo "
        <div class=\"featured-property column\">
          <div class=\"house-info column\">
            <h2>{$array[$index]['Title']}</h2>
            <h4>{$array[$index]['Suburb']}</h4>
            <h4>Auction Date:</h4>
            <h3>".format_date($array[$index]['AuctionDate'])."</h3>

            <ul>
              <li>Bathrooms: <span class=\"quantity\">{$array[$index]['Bathrooms']}</span></li>
              <li>Toilets: <span class=\"quantity\">{$array[$index]['Toilets']}</span></li>
              <li>Garage Spaces: <span class=\"quantity\">{$array[$index]['GarageSpaces']}</span></li>
             </ul>

            <a href=\"#\">Learn More &#8594;</a>
          </div>

          <div class=\"house-img row\">
            <img src=\"./media/properties/{$array[$index]['PID']}.png\" alt=\"Property Image\">
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

 ?>
