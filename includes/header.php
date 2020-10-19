<?php
include "database.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Welcome-<?php 
    if(isset($_SESSION['loggedin']))
    {
      echo $_SESSION['loggedin'];
    }
    else
    {
      echo "Guest";
    }
    ?></title>
  </head>
  <body>