<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    while(true) { //Doesn't actually loop just used for compatiability with break
      //Property
      $fname = $_POST['agent-fname'];
      $sname = $_POST['agent-sname'];
      $qualification = $_POST['agent-qualification'];
      $mobileph = $_POST['agent-mobileph'];
      $workph = $_POST['agent-workph'];
      $email = $_POST['agent-email'];
      $bio = $_POST['agent-bio'];
      $image = $_FILES['agent-image'];

      $agent_query = "INSERT INTO tbl_agents(
                          AID, FName,
                          SName, Qualification,
                          WorkPh, MobilePh,
                          Email, Bio
                        )
                        VALUES(
                          NULL, '{$fname}',
                          '{$sname}', '{$qualification}',
                          '{$mobileph}', '{$workph}',
                          '{$email}', '{$bio}'
                        )";
      //Add agent
      if(!$conn -> query($agent_query)){ //Run query and if fails
        break;
      }

      //Get AID of most recent agent
      $AID = get_from_table('tbl_agents',1,'tbl_agents.AID','DESC')[0]['AID'];
      //Define query to remove property in case listing or image fails
      $remove_query = "DELETE FROM tbl_agents
                          WHERE tbl_agents.AID = {$AID};";

      $target_location = "./media/agents/{$AID}.png";
      $image_valid = check_image($image,$target_location,"1:1"); //Check image is valid

      if ($image_valid && move_uploaded_file($image["tmp_name"], $target_location)) { //If image can be uploaded and is uploaded successfully
        //Redirect to added agent page (ending while loop)
        header("Location: ./agent-profile.php?AID={$AID}");
      }
      else{
        //Remove agent on image fail
        $conn -> query($remove_query);
        break;
      }
    }

//Display Error if loop broken
echo "<br>";
echo "An error has occured adding this agent. Please try again";
echo "<br>";
echo $conn -> error;
//Link Back to form
}
 ?>
