<?php include_once('header.php')?>
<div class="Row"> 
<div class="Container">
<h2 class= "chatroomLabel">Let's Chat Now!</h2>
</div>
</div>

<section class="phone">

<?php 
    if(isUser())
    {
        echo'
        <div class="logout">  
            <form action="/functions.php?op=logout" method="post">
                <button class="logoutBtn"><i class="fa fa-sign-out" ></i></button>
            </form>
        </div>
        <p class="greeting">Hello  <span class="blueTxt">'.ucwords($_SESSION['username']).'</span>! #<span class="highlight">'.$user['roomID'].'</span></p>
        ';
    }
?>

<div class="loginArea">
    <div class="top">  
        <div class= "icon">
            <div class="circle"></div>
            <div class="redspot">1</div>
        </div>
    </div>
    <?php 
        // check user logged in ?
        if(!isUser()||$_SESSION['username']=='adminreg'){
            echo'
            <form action="/functions.php" class="Column" method="post">
                <input class="loginCredit" type="text" placeholder="Username" name="username">
                <input class="loginCredit" type="password" placeholder="Password" name="password"></br>
                <div Class="bottom">'; 
                if($_SESSION['username']=='adminreg'){
                    echo'<input class="registerBtn" type="submit" value="Register" name="op">';
                }else{
                    echo'<input class="loginBtn" type="submit" value="Login" name="op">';
                }
            echo'</div>
            </form>
            ';
        }else{
            echo'
                <form action="/chatRoom.php" class="Column" method="post">
                    <input class="chatRoomEntry" type="text" placeholder="Enter Chat Room ID" name="chatID">
                    <div Class="bottom">';   
                    if($_SESSION['username']=='adminroom'){
                        echo'<input  type="submit" value="New" name="op">';
                        echo'<input  type="submit" value="Enter" name="op">';
                    }else{
                        echo'<input  type="submit" value="Enter" name="op">';
                    }
                echo'</div>
                </form>
            ';
        }
    ?>         
</div>
<?php
    // check user logged in ?
    if(!isUser()){
        if($_GET['msg']=='invalid'){
            echo'<label class="redTxt">Invaid username or password</label>';
        }elseif($_GET['msg']=='regCompleted'){
            echo'<label class="blueTxt">Successfully registered</br>You can sign up now</label>';
        }else{
            echo'<label class="blackTxt">Sign up or Log in</label>';
        }
    }else{
        if($_GET['msg']=='invalid'){
            echo'<label class="redTxt">Invaid Chat Room ID</label>';
        }else{
            echo'<label class="blackTxt">Enter existing chat room </label>';
            //or </br>open a new chat room
        }
    }
?>
</section>


<?php include_once('footer.php')?>