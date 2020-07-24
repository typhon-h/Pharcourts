<?php
//Function Definitions
declare(strict_types=1); // All variables must be the declared type

function format_date(string $date){ //Date in format YYYY-MM-DD
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

  $count = $query_result -> num_rows; //Check if empty
  if($count == 0){ //If no results
    return false;
  }

  while($item = $query_result-> fetch_assoc()){ //Iterate through items
    $results[] = $item; //Append to array
  }

  return $results; //Returns as array of associated arrays
}


function format_page_name(string $page_name){
  $formatted_name = str_replace('-', ' ', $page_name); //Add Spaces
  $formatted_name = ucwords($formatted_name); //Title Case

  return $formatted_name;
}


function get_aspect_ratio(int $width,int $height){ //Get aspect ratio of image
  if($width<$height){ //Get lower value between width and height
    $lower_number = $width;
  }
  else{
    $lower_number = $height;
  }
  //Ratio = width:height divided by the lower number between them (to make one of them = 1)
  $ratio = ($width/$lower_number).":".($height/$lower_number);
  return $ratio;
}


function check_image($image, string $target_location, string $aspect_ratio=""){
  //Get file type
  $file_type = strtolower(pathinfo($target_location,PATHINFO_EXTENSION));

  //Get Image Info
  $image_info = getimagesize($image['tmp_name']);


  //Check if image
  if($image_info == false){
    echo "File is not an image";
    return false; //Invalid
  }

  //Check File size
  if($image["size"] > 500000){ //Max file size 500kb
    echo "File too large";
    return false; //Invalid
  }

  //Check if not jpg
  if($file_type != "jpg"){
    echo "File must be .jpg format";
    return false; //Invalid
  }

  //Check correct aspect ratio
  $image_width = $image_info[0];
  $image_height = $image_info[1];
  //If aspect ratio is set and image matches aspect ratio
  if($aspect_ratio !== "" && get_aspect_ratio($image_width,$image_height) !== $aspect_ratio){
    echo "Image must have {$aspect_ratio} Aspect Ratio";
    return false; //Invalid
  }

  return true; //Image is valid
}


function secure(string $string){ //Injection security
  global $conn;
  // Add escape character to problematic characters eg. " ' \
  $string = $conn -> real_escape_string($string);
  //Remove HTML, PHP, JS tags to prevent injection
  $string = strip_tags($string);
  return $string;
}


function formalize_string(string $string){
  // Takes string and returns formatted

  $string = ltrim(rtrim($string)); // Trim whitespace from start and end
  $string = ucwords(strtolower($string)); // Title case
  //Apply Security
  $string = secure($string);
  return $string;
}


function get_search_criteria(array $minmax, string $field){ //Search criteria in range min-max

  //As no wildcard for int eg. BETWEEN % and 5
  //If statements are required to determine greater than, less than, or between
  if ($minmax[0] == '' and $minmax[1] == ''){ //Both not set
    $criteria = '';
  }
  elseif ($minmax[0] == ''){ //If min is not set
    $criteria = "AND {$field} <= {$minmax[1]}"; //field < max
  }
  elseif ($minmax[1] == ''){ //If max is not set
    $criteria = "AND {$field} >= {$minmax[0]}"; //field > min
  }
  else{
    $criteria = "AND {$field} BETWEEN {$minmax[0]} and {$minmax[1]}"; //between min and max
  }

  return $criteria;
}


function display_agent_card($agent){ //Echo agent card
  echo "
        <div class=\"card column\">
          <div class=\"card-head column\" style=\"background-image:url('./media/agents/{$agent['AID']}.jpg');\">
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

            <a href=\"./agent-profile.php?AID={$agent['AID']}\">View My Listings</a>
          </div>
        </div>";
}


function display_listing_card($listing){ //Echo listings card
  echo "
        <div class=\"card static-card column\">
          <div class=\"card-head column\" style=\"background-image: url('./media/properties/{$listing['Property']}.jpg');\">
            <h3>{$listing['Title']}</h3>
          </div>
          <div class=\"card-body column\">
             <p>
               {$listing['Address']}
               <br>
               {$listing['Suburb']}
             </p>

             <h2>".
             (($listing['Sold'])? "Sold":"$".number_format(floatval($listing['Price'])))
             ."</h2>

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

             <a href=\"./listing-profile.php?LID={$listing['LID']}\">Enquire &#8594;</a>

          </div>
        </div>";
}


function display_featured_property($property){ //Echo featured property
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

            <a href=\"./listing-profile.php?LID={$property['LID']}\">Learn More &#8594;</a> <!-- Right Arrow -->
          </div>

          <div class=\"house-img row\">
            <img src=\"./media/properties/{$property['PID']}.jpg\" alt=\"Property Image\">
          </div>
        </div>
      ";
}

 ?>
