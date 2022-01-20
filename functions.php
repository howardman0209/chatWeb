<?php
    ob_start();
    session_start();
    include_once('dbConnect.php');
    // echo $_POST['op'];
    if($_POST['op']=='Login')
    {
        echo $_POST['username'].'<br>';
        echo $_POST['password'];
        checkLogin($_POST['username'],$_POST['password']);

    }
    if($_POST['op']=='Register')
    {
        echo $_POST['username'].'<br>';
        echo $_POST['password'];
        reg($_POST['username'],$_POST['password']);
    }
    if($_GET['op']=='logout')
    {
        logout();
    }
    if($_GET['op']=='leaveChatRoom')
    {
        leaveChatRoom();
    }
    function leaveChatRoom()
    {
        session_start();
        unset($_SESSION["chatID"]);
        header("Location: /");
    }
    function logout()
    {
        session_start();
        session_destroy();
        header("Location: /");
        ob_end_flush();
    }
    function checkLogin($username, $password)
    {
        echo 'login';
        global $dbConnection; 
        $userQ = mysqli_query($dbConnection, "SELECT * FROM `users` WHERE `username` = '".$username."'");
        $user = mysqli_fetch_assoc($userQ);
        if($username == $user['username'] && ($password == $user['password']) && $username!='')
        {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: /index.php");
        }
        else
        {
            header("Location: /index.php?msg=invalid");
        }
    }
    function reg($username, $password)
    {
        echo 'reg';
        global $dbConnection; 
        global $dbName;
        $roomID = generateRandomString(5);
        if($username!='' && $password!=''){
            $sql = "INSERT INTO `$dbName`.`users` (
                `username`,
                `password`,
                `status`,
                `roomID` 
                 ) VALUES (
                 '{$username}', 
                 '{$password}',
                 'offine',
                 '{$roomID}')";
                echo $sql;
            if(mysqli_query($dbConnection, $sql))
            {
                header("Location: /index.php?msg=regCompleted");
            }
            else{
                echo'error occur</br>';
                echo $sql;
            }
        }else{
            header("Location: /index.php?msg=invalid");
        }
    }
    function chatRoomID($op, $chatRoomID)
    {
        if($op=='New'){
            session_start();
            $roomID = generateRandomString(5);
            $_SESSION['chatID'] = $roomID;
            return $roomID;
        }
        elseif($op=='Enter'){
            session_start();
            $_SESSION['chatID'] = $chatRoomID;
            return $chatRoomID;
        }else{
            return 2;
        }

    }
    function isUser()
    {
        return isset($_SESSION['username']);
    }
    function chatIsStarted()
    {
        return isset($_SESSION['chatID']);
    }
    function roomIDValidation($roomID)
    {
        global $dbConnection; 
        $sql ="SELECT * FROM `users` WHERE `roomID` = '$roomID' ";
        $roomQ = mysqli_query($dbConnection, $sql);
        $room = mysqli_fetch_assoc($roomQ);
        if($roomID==''){
            return false;
        }elseif($room==null){
            return false;
        }else{
            return true;
        }
    }
    function generateRandomString($length) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


?>