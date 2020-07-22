<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  if(isset($_POST['edit-submit'])){ //Agent Load
    //Get fields
    $agent = secure($_POST['edit-agent']);
    $query = "SELECT *
              FROM tbl_agents
              WHERE tbl_agents.AID = {$agent}";
    //Get agent
    $result = $conn -> query($query);
    //Define active_agent ($active_agent populates the form if set)
    $active_agent = $result -> fetch_assoc();
  }


  if(isset($_POST['agent-update'])){ //Agent Update
    //While loop does not iterate. Is used so that I can use break to exit statement if error occurs
    while(true) {
      //Get Fields
      $fname = formalize_string($_POST['agent-fname']);
      $sname = formalize_string($_POST['agent-sname']);
      $qualification = formalize_string($_POST['agent-qualification']);
      $mobileph = secure($_POST['agent-mobileph']);
      $workph = secure($_POST['agent-workph']);
      $email = secure($_POST['agent-email']);
      $bio = secure($_POST['agent-bio']);
      $image = $_FILES['agent-image'];
      $AID = secure($_POST['AID']);

      //Agent Update Query
      $update_query = "UPDATE tbl_agents
                       SET
                          FName = '{$fname}',
                          SName = '{$sname}',
                          Qualification = '{$qualification}',
                          MobilePh = '{$mobileph}',
                          WorkPh = '{$workph}',
                          Email = '{$email}',
                          Bio = '{$bio}'
                       WHERE AID = {$AID};";
      //Upload new image if it exists, else skip image
      if($image['error'] != 4){ //Error 4 is nothing submitted so if not nothing, or if file is submitted

        $target_location = "./media/agents/{$AID}.png";
        $image_valid = check_image($image,$target_location,"1:1"); //Check image is valid

        //Attempt to upload image if valid
        if (!$image_valid || !move_uploaded_file($image["tmp_name"], $target_location)) { //If image cannot be uploaded or is uploaded unsuccessfully
          break; //Error
        }
      }
      //Update database
      if($conn -> query($update_query)){ //Execute table update
        header("Location: ./agent-profile.php?AID={$AID}"); //Redirect
      }

      //Prevent iteration
      break; //Error - query failed or loop did not exit via redirect

    }

    //Display Error if loop broken
    echo "<br>";
    echo "An error has occured updating this agent. Some fields may not have been updated correctly.";
    echo echo $conn -> error;
  }


  if(isset($_POST['agent-delete'])){ //Agent Delete
    //Get fields
    $AID = secure($_POST['AID']);

    //Delete Query
    $delete_query = "DELETE FROM tbl_listings
                     WHERE tbl_listings.Agent = {$AID};
                     DELETE FROM tbl_agents
                     WHERE AID = {$AID};";
    $image_location = "./media/agents/{$AID}.png";

    //Delete Image. Delete All Associated listings and then Agent
    if (unlink($image_location) && $conn -> multi_query($delete_query)){ //Image and database information is removed
      //Redirect to delete success page
      header('Location: ./delete-confirmation.php');
    }

    else{
      //Show error
      echo "<br>";
      echo "An error has occured deleting this agent. Please try again.";
      echo "<br>";
      echo $conn -> error;
    }

  }
}
 ?>
