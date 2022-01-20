const txtFieldCon = document.querySelector(".txtFieldCon"),
inputField = txtFieldCon.querySelector(".txtField"),
sendBtn = txtFieldCon.querySelector("button");

// const chatIDRow = document.querySelector(".Row"),
// container = chatIDRow.querySelector(".Container"),
// chatroomLabel = container.querySelector(".chatroomLabel");
// chatID = chatroomLabel.querySelector("span");

const section = document.querySelector(".phone"),
chatbox = section.querySelector(".chatbox");

const row = document.querySelector(".Row"),
div = row.querySelector(".Container");
Abtn = div.querySelector("#A");
Bbtn = div.querySelector("#B");

Abtn.onclick= ()=>{ 
    // console.log('I am A');
    !$(Abtn).hasClass('btnClicked') ? 
    $(Abtn).addClass('btnClicked') && $(Bbtn).removeClass('btnClicked') && $('#senderID').val("A"): 
    $(Abtn).removeClass('btnClicked') && $(Bbtn).addClass('btnClicked') && $('#senderID').val("B");
}
Bbtn.onclick= ()=>{ 
    // console.log('I am B');
    !$(Bbtn).hasClass('btnClicked') ? 
    $(Bbtn).addClass('btnClicked') && $(Abtn).removeClass('btnClicked') && $('#senderID').val("B"): 
    $(Bbtn).removeClass('btnClicked') && $(Abtn).addClass('btnClicked') && $('#senderID').val("A");
}

// $('#A').on('click',function(){
//     console.log('I am A');
//     !$(this).hasClass('btnClicked') ? $(this).addClass('btnClicked') : $(this).removeClass('btnClicked');
// });
// $('#B').on('click',function(){
//     console.log('I am B');
//     !$(this).hasClass('btnClicked') ? $(this).addClass('btnClicked') : $(this).removeClass('btnClicked');
// });

sendBtn.onclick= ()=>{         
        var content = $('#inputMsg').val();
        var sender = $('#senderID').val();
        var chatID = $("#chatID").val();
        console.log(sender);
        if(content!=''){
            // console.log(sender);
            $.post("/sendChat.php",
            {
                chat_message: content, 
                chat_sender: sender,
                chat_ID: chatID
            },
            function(data,status){
                // alert("Data: " + data + "\nStatus: " + status);
                $('#inputMsg').val('');
                // $('.chatbox').append("<div class='Row'> <div class='outgoingMsg'><p class='msg' id='msg'>"+content+"</p></div></div>");
            });
        };
        inputField.focus();
    }


txtFieldCon.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    // console.log('onkeyup');
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

setInterval(() =>{
    // console.log($("#chatID").val());
    var chatID = $("#chatID").val();
    var sender = $('#senderID').val();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/getChat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatbox.innerHTML = data;
            // if(!sendBtn.classList.contains("active")){
            if($("#inputMsg").is(":focus")){
                scrollToBottom();
            }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(
        "chat_ID="+chatID+"&chat_sender="+sender
    );
}, 500);

function scrollToBottom(){
    chatbox.scrollTop = chatbox.scrollHeight;
}