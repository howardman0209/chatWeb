<?php
  ob_start();
  session_start();
  include_once('dbConnect.php');
  include_once('functions.php');
  include_once('loadUserInfo.php');
//   include_once('sendChat.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Let's Chat Now</title>
    <!-- <link rel = "icon" href =  "/icon/newtrovintage.PNG" type = "image/x-icon"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>