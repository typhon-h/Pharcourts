<?php
//Establish connection to database
  $dbhost = 'localhost';
  $dbname = 'pharcourts';
  $dbuser = 'root';
  $dbpass = '';

  //Create connection
  $conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

  // Check connection
  if($conn->connect_error){
    die("Connection Failed: " . $conn>connect_error);
  }

  //Initialize Login Session
  session_start(); //Session is global associative array
  if(!isset($_SESSION['IsAdmin'])){
    $_SESSION['User'] = NULL;
    $_SESSION['IsAdmin'] = false;
  }

 ?>
