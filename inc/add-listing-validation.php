<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){


  if(isset($_POST['property-submit'])){ //Property Load
    //Get Fields
    $PID = secure($_POST['add-property']);
    //Define property ($property populates the form if set)
    $property = get_from_table('tbl_properties',"tbl_properties.PID = {$PID}")[0];
  }


  if(isset($_POST['listing-submit'])){
    $remove_query = ""; //Query to remove added records if part fails
    do {
      //Property Related Fields
      $PID = secure($_POST['PID']);
      $address = formalize_string($_POST['listing-address']);
      $suburb = formalize_string($_POST['listing-suburb']);
      $bedrooms = secure($_POST['listing-bedrooms']);
      $bathrooms = secure($_POST['listing-bathrooms']);
      $toilets = secure($_POST['listing-toilets']);
      $garage_spaces = secure($_POST['listing-garage-spaces']);
      $size = secure($_POST['listing-size']);
      $year = secure($_POST['listing-year']);
      $construction = formalize_string($_POST['listing-construction']);
      $condition = formalize_string($_POST['listing-condition']);
      $insulation = formalize_string($_POST['listing-insulation']);
      $image = $_FILES['listing-image'];
      if (empty($insulation)){ //Check if insulation blank
        $insulation = "None";
      }

      //If existing property used update instead of append
      if($PID !== ''){
        $property_query = "UPDATE tbl_properties
                         SET
                            Address = '{$address}',
                            Suburb = '{$suburb}',
                            Bedrooms = {$bedrooms},
                            Bathrooms = {$bathrooms},
                            Toilets = {$toilets},
                            GarageSpaces = {$garage_spaces},
                            Size = {$size},
                            Year = {$year},
                            Construction = '{$construction}',
                            PCondition = '{$condition}',
                            Insulation = '{$insulation}'
                         WHERE PID = {$PID};";
      }
      else{ //New Property
        $property_query = "INSERT INTO tbl_properties(
                            PID, Address,
                            Suburb, Bedrooms,
                            Bathrooms, Toilets,
                            GarageSpaces, Size,
                            Year, Construction,
                            PCondition, Insulation
                          )
                          VALUES(
                            NULL, '{$address}',
                            '{$suburb}', {$bedrooms},
                            {$bathrooms}, {$toilets},
                            {$garage_spaces}, {$size},
                            {$year}, '{$construction}',
                            '{$condition}', '{$insulation}'
                          )";
      }

      //Add new property/Update existing property
      if(!$conn -> query($property_query)){ //Run query and if fails
        echo $conn -> error;
        break; //Error
      }

      //Get PID of new property
      if($PID == ''){ //If existing property not used get new PID
        $PID = get_from_table('tbl_properties',1,'tbl_properties.PID','DESC')[0]['PID'];
        //Append to delete query to remove new property in case listing or image fails
        $remove_query = "DELETE FROM tbl_properties
                            WHERE tbl_properties.PID = {$PID};";
      }


      //Listing Fields
      $title = formalize_string($_POST['listing-title']);
      $description = secure($_POST['listing-description']);
      $price = secure($_POST['listing-price']);
      //Most recent property to be added
      $property = $PID;
      $agent = secure($_POST['listing-agent']);
      $auction_date = secure($_POST['listing-auction-date']);

      //Listings Append Query
      $listing_query = " INSERT INTO tbl_listings(
                            LID, Title,
                            Description, Price,
                            Property, Agent,
                            AuctionDate, Sold
                          )
                          VALUES(
                            NULL, '{$title}',
                            '{$description}', {$price},
                            {$property}, {$agent},
                            '{$auction_date}', 0
                          )";
      //Add listing
      if(!$conn -> query($listing_query)){ //Run query and if fails
        echo $conn -> error;
        //Remove property as only allow it to stay if whole operation is valid
        if($PID !== ''){
          $conn -> query($remove_query);
        }
        break; //Error
      }
      //Get LID of most recent listing
      $LID = get_from_table('tbl_listings',1,'tbl_listings.LID','DESC')[0]['LID'];
      //If new property or image has been uploaded
      echo $LID;
      if($PID == '' ||  $image['error'] != 4){
        //Add listings to remove query

        //Add listings to start of string as listing must be removed before property due to relationship in PHPMyAdmin
        $remove_query = "DELETE FROM tbl_listings
                         WHERE tbl_listings.LID = {$LID};" . $remove_query;

        $target_location = "./media/properties/{$PID}.jpg";
        $image_valid = check_image($image,$target_location,"2:1"); //Check image is valid

        //Attempt to upload image if valid
        if ($image_valid && move_uploaded_file($image["tmp_name"], $target_location)) { //If image can be uploaded and is uploaded successfully
          header("Location: ./listing-profile.php?LID={$LID}"); //Redirect
        }
        else{
          //Remove property and listing
          $conn -> multi_query($remove_query);
          break; //Error
        }
      }

      else{ //If no image for existing property
        header("Location: ./listing-profile.php?LID={$LID}"); //Redirect
      }

    } while(0);
    $property = NULL;
    //Display Error if loop broken
    echo "<br>";
    echo "An error has occured adding this listing. Please try again";
    echo "<br>";
      }
}
 ?>
