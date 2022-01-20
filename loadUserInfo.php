<?php
include_once('dbConnect.php');
include_once('functions.php');

//get user's Info
session_start();
$username = $_SESSION['username'];
// echo  $username  .'</br>';
$sql ="SELECT * FROM `users` WHERE `username` = '$username' ";
// echo $sql;

    $userQ = mysqli_query($dbConnection, $sql);
    $user = mysqli_fetch_assoc($userQ);
    // echo '<pre>';
    // var_dump($user);
    // echo '</pre></br>';