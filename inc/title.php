<?php
  $active_page = get_active_page();

  if ($active_page == 'index'){
    $title_text = "Home is where the heart is"; //Slogan
  }
  else{ //Main text is page name
    $title_text = str_replace('-', ' ', $active_page); //Add spaces
    $title_text = ucwords($title_text); //Title Case
  }
 ?>

 <div class="title column">
  <?php
    //Style for background image here so
    //PHP can be used to dynamically change url
    echo "<style media=\"screen\">
            .title{
              background-image: url('./media/".$active_page."-background".".png');
            }
          </style>";
   ?>

   <h1><?php echo $title_text; ?></h1> <!-- Title Text -->

  <?php
    //Display search in title for index page
    if ($active_page == 'index'){
      include './inc/search-form.php';
    }
   ?>
 </div>