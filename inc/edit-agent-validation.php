<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  if(isset($_POST['edit-submit'])){
    $agent = secure($_POST['edit-agent']);
    $query = "SELECT *
              FROM tbl_agents
              WHERE tbl_agents.AID = {$agent}";
    $result = $conn -> query($query);
    $active_agent = $result -> fetch_assoc();
  }


  if(isset($_POST['agent-update'])){
    while(true) { //Doesn't actually loop just used for compatiability with break
      //Property
      $fname = formalize_string($_POST['agent-fname']);
      $sname = formalize_string($_POST['agent-sname']);
      $qualification = formalize_string($_POST['agent-qualification']);
      $mobileph = secure($_POST['agent-mobileph']);
      $workph = secure($_POST['agent-workph']);
      $email = secure($_POST['agent-email']);
      $bio = secure($_POST['agent-bio']);
      $image = $_FILES['agent-image'];
      $AID = secure($_POST['AID']);

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
      //Upload new image if exists
      if($image['error'] != 4){ //Error 4 is nothing submitted so if not nothing, or if file is submitted

        $target_location = "./media/agents/{$AID}.png";
        $image_valid = check_image($image,$target_location,"1:1"); //Check image is valid

        if (!$image_valid || !move_uploaded_file($image["tmp_name"], $target_location)) { //If image cannot be uploaded or is uploaded unsuccessfully
          break;
        }
      }
      //Update database
      if($conn -> query($update_query)){
        header("Location: ./agent-profile.php?AID={$AID}");
      }
      else{
        echo $conn -> error;
      }
      //Prevent iteration
      break; //Break to show error as redirect did not work

    }

    //Display Error if loop broken
    echo "<br>";
    echo "An error has occured updating this agent. Some fields may not have been updated correctly.";
  }


  if(isset($_POST['agent-delete'])){
    $AID = $_POST['AID'];

    $delete_query = "DELETE FROM tbl_listings
                     WHERE tbl_listings.Agent = {$AID};
                     DELETE FROM tbl_agents
                     WHERE AID = {$AID};";
    $image_location = "./media/agents/{$AID}.png";

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
