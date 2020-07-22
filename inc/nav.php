<?php
  $nav_state = 'default';

  if($_SESSION['IsAdmin']){ //Switch to ADMIN nav if permissions allow
    $nav_state = 'admin';
  }

  if(isset($_SESSION['User'])){ //Switch Login/Logout based on current session
    $login_state = 'logout'; //Is Logged In
  }
  else{
    $login_state = 'login'; //Isn't Logged In
  }

  switch ($nav_state) { //Assign Nav Items
    case 'admin': //Admin Menu
      $home = 'admin-menu'; //Admin Home page
      //Nav Items as page names
      $nav_items = ['add-listing','edit-listing','add-agent','edit-agent'];
      break;

    default: //Default Menu
      //Pages to add to nav
      $home = 'index'; //Default home page
      //Nav Items as page names
      $nav_items = ['listings','agents','about-us','contact-us'];
      break;
  } //End Switch
 ?>

<div class="nav row">
  <!-- Logo Link to Home -->
   <?php echo "<a id=\"logo-link\" href=\"./{$home}.php\">"?><img class = "logo" src="./media/logo.png" alt="Logo"></a>

  <!-- Nav items -->
   <div class="nav-items row">
     <div class="nav-buttons row">
       <?php
         //Echo Home link
         echo "<a ".(($active_page == $home)? "class=\"active\"":NULL)."  href=\"./{$home}.php\">Home</a>";

         foreach($nav_items as $item){ //Iterate through each nav item
           $text = format_page_name($item); //Get Formatted Page Name
           //Display page name with link to page
           echo "<a ".(($active_page == $item)? "class=\"active\"":NULL)." href=\"./{$item}.php\">{$text}</a>";
         }
        ?>
     </div>

    <!-- Login Items -->
     <div class="nav-login">
       <!-- Login/Logout Button -->
       <?php
         echo "<a href=\"./{$login_state}.php\">".format_page_name($login_state)."</a>";
        ?>
     </div>
   </div>
 </div>
