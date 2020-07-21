
<?php
  $login_error_message = ""; //Blank by default

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['login-user'];
    $password = $_POST['login-pass'];

    $user = get_from_table('tbl_users',"tbl_users.Username = '{$username}'")[0];
    if($user != false && $password == $user['Password']){ //User+Password Valid
      $_SESSION['User'] = $user['Username']; //Define Session User
      $_SESSION['IsAdmin'] = $user['IsAdmin']; //Set Session Permissions
      header('Location: ./admin-menu.php'); //Redirect
    }
    else{ //No User or wrong password
      $login_error_message = "Incorrect Username or Password";
    }

  }
 ?>

<form class="login-form column" method="post">
  <div class="column">
    <input type="text" name="login-user" placeholder="Username..." required autofocus>
    <input type="password" name="login-pass" placeholder="Password..." required>
  </div>

  <input type="submit" name="login-submit" value="Login">

  <span class='error'>
    <?php
      echo $login_error_message;
    ?>
  </span>
</form>
