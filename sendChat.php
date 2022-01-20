<?php 
    include_once('dbConnect.php');

  
        $message = $_POST['chat_message'];
        $senderID = $_POST['chat_sender'];
        $chatID = $_POST['chat_ID'];
        $dt = new DateTime("now", new DateTimeZone('Asia/Hong_Kong'));
        $createAt = $dt->format('Y-m-d H:i:s');

       $sql= "
        INSERT INTO `messages` 
        (
        msg,
        senderID,
        createAt,
        chatID
        ) VALUES (
        '{$message}',
        '{$senderID}',
        '{$createAt}',
        '{$chatID}'
        )";

    if(mysqli_query($dbConnection, $sql))
    {
        echo'success</br>';
    }
    else{
        echo'error occur</br>';
        echo $sql;
    }
?>