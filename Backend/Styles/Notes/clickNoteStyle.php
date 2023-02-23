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
.Content > div{
    text-align:center;
    margin-bottom:3%;
    margin-top:0%;
}
.Content > div > textarea{
    resize:none;
    font-weight:bold;
    outline:none;
    margin:12px 0 0 0;
    border:solid black;
    height:30vh;
    background:url("../../../Assets/Global/MyNotesDescriptionLines.png");
    background-position:0px 15px;
    background-repeat:no-repa;
    line-height:5vh;
}
.Content .NoteTitleAndDescription{
    display:inline-block;
    text-align:center;
    margin-top:5.2%;
    margin-bottom:2.3%;
    width:900px;
    height:340px;
    background:url("../../../Assets/Global/NoteBackground.png");
    background-repeat:no-repeat;
    background-position: center;
    background-size:cover;
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
