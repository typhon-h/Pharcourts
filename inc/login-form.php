<form class="login-form column" method="post">
  <div class="column">
    <input type="text" name="login-user" placeholder="Username..." required autofocus>
    
    <input type="password" name="login-pass" placeholder="Password..." required>
  </div>

  <input type="submit" name="login-submit" value="Login">

  <span class='error'>
    <?php //Error Message if validation fails
      echo $login_error_message;
    ?>
  </span>
</form>
