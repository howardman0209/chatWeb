<?php

    $server = "127.0.0.1";
    $username = "root";
    $password = "";         //  Your database password
    $dbName = "chatApp";   //  Your database name

    //for public server
    //  $server = "localhost";
    //  $username = "cheetahk";
    //  $password = "8zYNbPd518@;iB";
    //  $dbName = "cheetahk_newtrovintage;

    $dbConnection = mysqli_connect($server,$username,$password,$dbName);

    if(!$dbConnection)
    {
        echo "Fail to connect to MySQL:".mysqli_connect_error();
        exit();
    }

    if(mysqli_connect("$server","$username","$password","$dbName"))
    {
        // echo "db Connect successfully!";
    }
    else
    {
        echo "db Connect failure!";
    }