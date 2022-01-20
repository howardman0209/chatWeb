<?php
    include_once('dbConnect.php');  
    $chatID = $_POST['chat_ID'];
    $username = $_POST['chat_sender'];
    // echo '<br>hasasasajsansna'.$username;
    $sql = "SELECT * FROM messages
            WHERE (chatID = '{$chatID}')
            ORDER BY msg_id";

    $msgRecord = mysqli_query($dbConnection, $sql);
    if(mysqli_query($dbConnection, $sql))
    {
        while($msg = mysqli_fetch_assoc($msgRecord))
        {
            //get H:i from timestamp
            $pieces = explode(" ", $msg['createAt']);
            $arr1 = str_split($pieces[1],5);
            $msg_time =  $arr1[0];
            //
            if($msg['senderID'] == $username)
            {
                echo "<div class='Row'> <div class='outgoingMsg'><p class='msg' id='msg'>".$msg['msg']."</p><p class='msg_time' id='msg_time'>$msg_time</p></div></div>";
            }
            else
            {
                echo "<div class='Row'> <div class='incomingMsg'><p class='senderName' id='senderName'>".ucwords($msg['senderID'])."</p><p class='msg' id='msg'>".$msg['msg']."</p><p class='msg_time' id='msg_time'>$msg_time</p></div></div>";
            }

            // echo $msg['msg'];
        }
    }
    else{
        echo'error occur</br>';
        echo $sql;
    }

?>