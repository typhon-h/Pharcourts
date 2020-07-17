<?php
  $nav_state = 'default';

  if($_SESSION['IsAdmin']){ //When logged in check admin state
    $nav_state = 'admin';
  }

  if(isset($_SESSION['User'])){
    $login_state = 'logout';
  }
  else{
    $login_state = 'login';
  }

  switch ($nav_state) { //Custom nav content based on permissions
    case 'admin':
      //Pages to add to nav
      $home = 'admin-menu';
      $nav_items = ['add-listing','edit-listing','add-agent','edit-agent'];
      break;

    default:
      //Pages to add to nav
      $home = 'index';
      $nav_items = ['listings','agents','about-us','contact-us'];
      break;
  }
 ?>

<div class="nav row">
   <a href="./index.php" id="logo-link"><img class = "logo" src="./media/logo.png" alt="Logo"></a>
   <div class="nav-items row">
     <div class="nav-buttons row">
       <?php
         echo "<a href=\"./{$home}.php\">Home</a>";

         foreach($nav_items as $item){
           $text = format_page_name($item);
           echo "<a href=\"./{$item}.php\">{$text}</a>";
         }
        ?>
     </div>

     <div class="nav-login">
       <?php
         echo "<a href=\"./{$login_state}.php\">".format_page_name($login_state)."</a>";
        ?>
     </div>
   </div>
 </div>
