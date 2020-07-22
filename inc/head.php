<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/style-mobile.css">
  <link rel="shortcut icon" type="image/x-icon" href="./media/favicon.ico" />
  <title>Pharcourts</title>
  <?php
    include "./inc/connect.php"; //Connect to database
    include "./inc/functions.php"; //Access to user-defined functions
    $active_page = get_active_page(); //Get active page and make available to whole website
  ?>
</head>
