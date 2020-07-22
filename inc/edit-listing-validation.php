<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  if(isset($_POST['edit-submit'])){ //Listing Load
    //Get Fields
    $property = secure($_POST['edit-listing']);
    $query = "SELECT *
              FROM tbl_listings
              INNER JOIN tbl_properties
              ON tbl_listings.Property = tbl_properties.PID
              WHERE tbl_listings.Property = {$property}";
    //Get property
    $result = $conn -> query($query);
    //Define listing ($listing populates the form if set)
    $listing = $result -> fetch_assoc();
  }


  if(isset($_POST['listing-update'])){ //Listing Update
    //While loop does not iterate. Is used so that I can use break to exit statement if error occurs
    while(true) {
      //Property Related Fields
      $address = secure($_POST['listing-address']);
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
      $listing_state = secure($_POST['listing-sold']);
      $PID = secure($_POST['PID']);
      if (empty($insulation)){ //Check if insulation blank
        $insulation = "None";
      }

      //Property Update Query
      $update_query = "UPDATE tbl_properties
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
      //Listing Fields
      $title = formalize_string($_POST['listing-title']);
      $description = secure($_POST['listing-description']);
      $price = secure($_POST['listing-price']);
      $agent = secure($_POST['listing-agent']);
      $auction_date = secure($_POST['listing-auction-date']);
      $LID = secure($_POST['LID']);

      //Listing Update Query
      $update_query .= "UPDATE tbl_listings
                        SET
                          Title = '{$title}',
                          Description = '{$description}',
                          Price = {$price},
                          Agent = {$agent},
                          AuctionDate = '{$auction_date}',
                          Sold = {$listing_state}
                        WHERE LID = {$LID};";

      //Upload new image if it exists, else skip image
      if($image['error'] != 4){ //Error 4 is nothing submitted so if not nothing, or if file is submitted

        $target_location = "./media/properties/{$PID}.png";
        $image_valid = check_image($image,$target_location,"2:1"); //Check image is valid

        //Attempt to upload image if valid
        if (!$image_valid || !move_uploaded_file($image["tmp_name"], $target_location)) { //If image cannot be uploaded or is uploaded unsuccessfully
          break; //Error
        }
      }
      //Update database
      if($conn -> multi_query($update_query)){ //Execute table updates
        header("Location: ./listing-profile.php?LID={$LID}"); //Redirect
      }

      //Prevent iteration
      break; //Error - query failed or loop did not exit via redirect
    }

    //Display Error if loop broken
    echo "<br>";
    echo "An error has occured updating this listing. Some fields may not have been updated correctly.";
    echo "<br>";
    echo $conn -> error;
  }


  if(isset($_POST['listing-delete'])){ //Listing Delete
    //Get fields
    $LID = secure($_POST['LID']);

    //Delete Query
    $delete_query = "DELETE FROM tbl_listings
                     WHERE LID = {$LID};";

    if ($conn -> query($delete_query)){ //Database information is removed
      //Redirect to delete success page
      header('Location: ./delete-confirmation.php');
    }

    else{
      //Show error
      echo "<br>";
      echo "An error has occured deleting this listing. Please try again.";
      echo "<br>";
      echo $conn -> error;
    }

  }
}
 ?>
