<?php

  switch ($active_page) { //Change Title based on page
    case 'index':
      $title_text = "Home is where the heart is"; //Slogan
      break;

    case 'agent-profile':
      $title_text = "{$agent['FName']} {$agent['SName']}";
      break;

    case 'listing-profile':
      $title_text = "{$listing['Address']}";
      break;

    default: //Main text is page name
      $title_text = str_replace('-', ' ', $active_page); //Add spaces
      $title_text = ucwords($title_text); //Title Case
      break;
  }
 ?>

 <div class="title column">
  <?php
    //Style for background image here so
    //PHP can be used to dynamically change url
    echo "<style media=\"screen\">
            .title{
              background-image: url('./media/"."{$active_page}-background".".png');
            }
          </style>";
   ?>

   <h1><?php echo $title_text; ?></h1> <!-- Title Text -->

  <?php
    //Display search in title for index and listings page
    if ($active_page == 'index' OR $active_page == 'listings'){
      include './inc/listings-search-form.php';
    }

    //Display agent contact information for contact page
    if ($active_page == 'agent-profile'){
      echo "
          <div class=\"contact-details row\">
            <p>
              <b>W:</b>
              <a href=\"tel:{$agent['WorkPh']}\">{$agent['WorkPh']}</a>
            </p>
            <p>
              <b>M:</b>
              <a href=\"tel:{$agent['MobilePh']}\">{$agent['MobilePh']}</a>
            </p>
            <p>
              <b>E:</b>
              <a href=\"mailto:{$agent['Email']}\">{$agent['Email']}</a>
            </p>
          </div>";
    }

   ?>
 </div>
