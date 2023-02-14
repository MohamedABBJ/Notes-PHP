<?php 
header('Content-type: text/css; charset:UTF-8')
?>
.Content .Notes .Notebtn{
    width:250px;
    height:140px;
}

.Content .Notes{
    justify-content: center;
    align-items: center;
    display: flex;
    flex-direction: row;
    flex-wrap:wrap;
    
}
.Content .Notes > div{
    padding: 15px;
}

.GeneralContent{
    position:relative;
    margin-top:-69.5vh;
    margin-left:18.2%;
    height:68.6vh;
    width:81.4%;
    border:solid black;
}

.TopBarContent{
    position:relative;
    border:solid black;
    width:81.4%;
    height:30vh;
    margin-top:-0.2vh;
    margin-left:18.2%;
    background: url("../Assets/Index/UserBackground.png");
}
.TopBarContent .TopBarContent_WelcomeMessage{
    font-size:40px;
    margin-top:11%;
    margin-left:3%;
    color:white;
}

.LeftBarContent{
    margin-top:-32vh;
    position:relative;
    width:18%;
    height:100vh;
    border:solid black; 
    background-color: #004c42;
}

.LeftBarContent .LeftBarContent_Username{
    position:absolute;
    bottom:20px;
    left:10%;
    color:white;
}

.LeftBarContent .LeftBarContent_NotesMark{
    position:absolute;
    padding-top:;
    padding:10%;
}

.LeftBarContent .LeftBarContent_Buttons{
    margin-top:80%;
    padding-left:5%;
    width:94%;
    position:absolute;
}

.LeftBarContent .LeftBarContent_LogoutButton{
    position:absolute;
    bottom:10px;
    right:20px;
    
}

.LeftBarContent .LeftBarContent_LogoutButton form > input{
    background-color:transparent;
    border-radius:20px;
    border: 2px solid white;
    height:6vh;
    width:70px;
    color:white;
}

.LeftBarContent .LeftBarContent_LogoutButton form > input:hover{
    background-color:#003a33;
}

.LeftBarContent .LeftBarContent_Buttons button{
    width:94%;
    height:5vh;
    background-color:#003a33;
    border-radius:20px;
    border:none;
}
.LeftBarContent .LeftBarContent_Buttons button:hover{
    background-color:#003a33;
}

.LeftBarContent .LeftBarContent_Buttons button > p{
    position:relative;
    margin-left:20%;
    color:white;
    top:7px;
    width:20%;
}
.LeftBarContent .LeftBarContent_Buttons button > img{
    position:relative;
    bottom:10px;
    margin-right:80%;
}

