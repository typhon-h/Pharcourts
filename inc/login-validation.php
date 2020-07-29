<?php
  $login_error_message = ""; //Blank by default

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Get Fields
    $username = secure($_POST['login-user']);
    $password = secure($_POST['login-pass']);

    $user = get_from_table('tbl_users',"tbl_users.Username = '{$username}'");

    if ($user){ //Get user information if query not false
      $user = $user[0];
    }

    if($user != false && password_verify($password,$user['Password']) ){
      //If Valid Credentials
      $_SESSION['User'] = $user['Username']; //Define Session User
      $_SESSION['IsAdmin'] = $user['IsAdmin']; //Set Session Permissions
      header('Location: ./admin-menu.php'); //Redirect
    }
    else{ //No User or Wrong Password
      //Display Error Message
      $login_error_message = "Incorrect Username or Password";
    }

  }
 ?>
