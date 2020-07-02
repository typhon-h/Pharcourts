<?php
//Establish connection to database
  $dbhost = 'localhost';
  $dbname = 'pharcourts';
  $dbuser = 'default'; //For full access use 'root'
  $dbpass = '';

  //Create connection
  $conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

  // Check connection
  if($conn->connect_error){
    die("Connection Failed: " . $conn>connect_error);
  }

  // echo "Connection Successful";

 ?>
