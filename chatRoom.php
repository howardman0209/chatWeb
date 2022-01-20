<?php 
    include_once('header.php');
    if(!isUser()){
        header("Location: /");
    }else{
        // echo $_SESSION['username'];
        // echo 'ID: '.$_POST['chatID'];
        if(!roomIDValidation($_POST['chatID'])){
            session_start();
            unset($_SESSION["chatID"]);
            ob_end_flush();
            header("Location: /index.php?msg=invalid");
        }elseif(!chatIsStarted()){
            $chatID = chatRoomID($_POST['op'],$_POST['chatID']);
        }else{
            session_start();
            $chatID = $_SESSION["chatID"];
            // echo $_POST['op'].'<br>'.$_POST['chatID'].'<br>'.$_SESSION["chatID"];
        }
    }
?>
<div class="Row"> 
    <div class="Container">
        <h2 class= "chatroomLabel">Chat Room:   
        <?php 
        echo      
            '<span class="blueTxt">'.$chatID.'</span>
            <input type="text" id="chatID" name="chatID" value="'.$chatID.'" hidden>
            '
        ?>
        </h2>
        <div class="logout">  
            <form action="/functions.php?op=leaveChatRoom" method="post">
                <button class="logoutBtn"><i class="fa fa-arrow-left" ></i></button>
            </form>
        </div>
        <button class="btnClicked" id="A" hidden>A</button>
        <button id="B" hidden>B</button>
    </div>
</div>
<body>
<section class="phone">
    <div class="chatbox">
        <!-- <div class="Row">
            <div class="incomingMsg">
                <p class='senderID' id='senderID'>Sender</p>
                <p class="msg" id="msg">incoming message</p>
                <p class="msg_time" id="msg_time">00:00</p>
            </div>
        </div>
        <div class="Row">
            <div class="outgoingMsg">
                <p class="msg">outgoing message</p>
                <p class="msg_time" id="msg_time">00:00</p>
            </div>	
        </div>    	 -->
    </div>

    <div  class="txtFieldCon">
        <input class="senderID" id="senderID" type="text" value=<?php echo'"'.$_SESSION['username'].'"'?> hidden>
        <input class="txtField" id="inputMsg" type="text" placeholder="Type a message here...">
        <button class="btn" value="send">send</button>
    </div>
</section>
<script src="chat.js"></script>
<?php include_once('footer.php')?>