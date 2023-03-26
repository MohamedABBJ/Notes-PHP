<?php 
header('Content-type: text/css; charset:UTF-8')
?>

.Content{
    position:absolute;
    margin-top:-75vh;
    margin-left:18.2%;
    height:68.6vh;
    width:81.7%;
    text-align:center;
    
}
.Content .NoteTitleAndDescription{
    display:inline-block;
    text-align:center;
    margin-top:5.2%;
    margin-bottom:2.3%;
    width:890px;
    height:360px;
    background:url("../../../Assets/Global/NoteBackground.png");
    background-position: center;
    background-size:900px;
    border:solid green;
    border-radius:20px;
}


.Content .NoteTitleAndDescription .NoteDescription > textarea{
    resize:none;
    font-weight:bold;
    outline:none;
    margin:5px 0 5px 0;
    height:200px;
    width:680px;
    background:url("../../../Assets/Global/MyNotesDescriptionLines.png");
    background-position:0px 35px;
    background-attachment:local;
    border:none;
    line-height:49px;
    font-size:20px;

}
.Content .NoteTitleAndDescription .NoteDescription > textarea:disabled{
    color:black;
}


.Content .NoteTitleAndDescription .NoteDescription{
    margin:15px 0 5px 0;
    display:inline-block;
    text-align:center;
    border:solid black;
    border-radius:20px;
    width:700px;
}

.Content .buttons{
    position:relative;
    margin-top:-12px;
}
.Content .buttons button{
    background-color:#FE5300;
    font-size:18px;
    border:none;
    border-radius:10px;
    width:25%;
    height:40px;
    color:white;
}
.Content .buttons button:hover{
    background-color:#db4800;
}
.Content .buttons button:active{
    background-color:#b83c00;
}
.LeftBarContent .LeftBarContent_Buttons .HomeButton{
   background-color:#004c42;
}
.LeftBarContent .LeftBarContent_Buttons .ViewingNoteButton {
    margin-top:3px;
    margin-left:20px;
    width:198px;
}
.LeftBarContent .LeftBarContent_Buttons .ViewingNoteButton > p{
    width:80px;
    top:10px;
}
.LeftBarContent .LeftBarContent_Buttons .ViewingNoteButton > img{
    content:url("../../../Assets/Global/ViewingNoteIcon.png");

}
