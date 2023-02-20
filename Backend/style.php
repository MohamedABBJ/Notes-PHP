<?php 
header('Content-type: text/css; charset:UTF-8')
?>
.Content .Notes .Notebtn{
    width:197px;
    height:205px;
    background: url("../Assets/Global/NoteBackground.png");
    background-repeat:no-repeat;
    border:none;
}

.Content .Notes .Notebtn:hover{
    background:url("../Assets/Global/NoteBackgroundHover.png");
}

.Content .Notes .Notebtn:active{
    background:url("../Assets/Global/NoteBackgroundActive.png");
}

.Content .Notes .Notebtn .NoteTitle{
    text-align:left;
    margin:-30px 0px 0px 10px;
    font-weight:bold;
    font-size:20px;
}
.Content .Notes .Notebtn .NoteDescription{
    margin:-10px 0px 0px 0px;
    width:80%;
    resize:none;
    overflow:hidden;
    border:none;
    outline:none;
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

.NotesContent{
    position:relative;
    margin-top:-69.5vh;
    margin-left:18.2%;
    height:68.6vh;
    width:81.4%;
    border:solid black;
}