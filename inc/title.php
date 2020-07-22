<?php

  switch ($active_page) { //Special Title Conditions
    case 'index': //Slogan
      $title_text = "Home is where the heart is";
      break;

    case 'agent-profile': //Agent Name
      $title_text = "{$agent['FName']} {$agent['SName']}";
      break;

    case 'listing-profile': //Property Address
      $title_text = "{$listing['Address']}";
      break;

    case 'admin-menu': //Welcome Message
      $title_text = "Welcome Back, {$_SESSION['User']}.";
      break;

    default: //Default to name of page
      $title_text = format_page_name($active_page);
      break;
  } //End Switch
 ?>

 <div class="title column">
  <?php
    //Style for background image here
    //PHP can be used to dynamically change CSS url for bg
    echo "<style media=\"screen\">
            .title{
              background-image: url('./media/"."{$active_page}-background".".jpg');
            }
          </style>"; //Set BG Image
   ?>

   <h1><?php echo $title_text; ?></h1> <!-- Title Text -->

  <!-- Additional Title Content -->
  <?php
    switch ($active_page) { //Special Conditions
      case 'index': //Index Page or Listings Page
      case 'listings': //Search Form
        include './inc/listings-search-form.php';
        break;

      case 'agent-profile': //Agent Contact Details
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
        break;

      case 'listing-profile': //Listing Suburb
        echo "<h2>{$listing['Suburb']}</h2>";
        break;
    }
   ?>
 </div>
