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
    position:relative;
}
.Content .NoteTitleAndDescription > h2{
    padding:0px 0px 5px 0px;
}
.Content .NoteTitleAndDescription > form > h2{
    color:blue;
    padding:10px 0px 0px 0px;
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
.Content .NoteTitleAndDescription #NoteTitleAndDescriptionContent > form > input{
    background-color:transparent;
    border:none;
    font-size:32px;
    font-weight:bold;
    width:70%;
    text-align:center;
    border-bottom:solid rgba(0, 0, 0, .2);
}
.Content .NoteTitleAndDescription #NoteTitleAndDescriptionContent > form > input:focus{
    outline-style:solid;
    outline-color:black;
    outline-width:2px;
    border-radius:10px;
}

.Content .NoteTitleAndDescription .NoteDescription{
    margin:13px 0 5px 0;
    display:inline-block;
    text-align:center;
    border:solid black;
    border-radius:20px;
    width:700px;
}
.Content .NoteTitleAndDescription .NoteEdited{
    position:absolute;
    text-align:center;
    vertical-align: middle;
    width:100%;
    top:35%;
}
.Content .buttons button{
    background-color:#FE5300;
    font-size:18px;
    border:none;
    border-radius:10px;
    width:278px;
    height:40px;
    color:white;
}
.Content .buttons .editBtn{
    position:relative;
    top:27px;
    right:141px;
}
.Content .buttons .cancelBtn{
    position:relative;
    bottom:12px;
    left:141px;
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
    margin-left:20px;
    width:185px;
    background-color:#004c42;
}
.LeftBarContent .LeftBarContent_Buttons .ViewingNoteButton > p{
    width:80px;
}
.LeftBarContent .LeftBarContent_Buttons .ViewingNoteButton > img{
    content:url("../../../Assets/Global/ViewingNoteIcon.png");

}
.LeftBarContent .LeftBarContent_Buttons .EditingNoteButton {
    margin-top:3px;
    margin-left:40px;
    width:185px;
}
.LeftBarContent .LeftBarContent_Buttons .EditingNoteButton > p{
    width:80px;
}
.LeftBarContent .LeftBarContent_Buttons .EditingNoteButton > img{
    content:url("../../../Assets/Global/EditingNoteIcon.png");

}
