<?php
  session_start(); //Activate Session
  session_destroy(); //Wipe Session array of all information (log out)
  header('Location: ./index.php'); //Redirect to home
 ?>
