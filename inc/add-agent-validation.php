<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //While loop does not iterate. Is used so that I can use break to exit statement if error occurs
  do{
    //Property Fields
    $fname = formalize_string($_POST['agent-fname']);
    $sname = formalize_string($_POST['agent-sname']);
    $qualification = formalize_string($_POST['agent-qualification']);
    $mobileph = secure($_POST['agent-mobileph']);
    $workph = secure($_POST['agent-workph']);
    $email = secure($_POST['agent-email']);
    $bio = secure($_POST['agent-bio']);
    $image = $_FILES['agent-image'];

    //Add agent query
    $agent_query = "INSERT INTO tbl_agents(
                        AID, FName,
                        SName, Qualification,
                        WorkPh, MobilePh,
                        Email, Bio
                      )
                      VALUES(
                        NULL, '{$fname}',
                        '{$sname}', '{$qualification}',
                        '{$workph}', '{$mobileph}',
                        '{$email}', '{$bio}'
                      )";
    //Add agent
    if(!$conn -> query($agent_query)){ //Run query and if fails
      break; //Error
    }

    //Get AID of most recent agent to be added
    $AID = get_from_table('tbl_agents',1,'tbl_agents.AID','DESC')[0]['AID'];
    //Define query to remove property in case listing or image fails
    $remove_query = "DELETE FROM tbl_agents
                      WHERE tbl_agents.AID = {$AID};";

    $target_location = "./media/agents/{$AID}.jpg";
    $image_valid = check_image($image,$target_location,"1:1"); //Check image is valid

    //Attempt to upload image if valid
    if ($image_valid && move_uploaded_file($image["tmp_name"], $target_location)) { //If image can be uploaded and is uploaded successfully
      header("Location: ./agent-profile.php?AID={$AID}"); //Redirect
    }
    else{
      //Remove agent on image fail
      $conn -> query($remove_query);
      break; //Error
    }
  } while (0);

//Display Error if loop broken
echo "<br>";
echo "An error has occured adding this agent. Please try again";
echo "<br>";
echo $conn -> error;
}
 ?>
