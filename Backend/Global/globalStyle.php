<?php 
header('Content-type: text/css; charset:UTF-8')
?>
*{
    font-family: Kanit;
    margin:0;
    padding:0;
}
html{
    height:100vh;
    width:auto;
}
.TopBarContent{
    position:relative;
    border:solid black;
    width:81.4%;
    height:30vh;
    margin-top:-0.2vh;
    margin-left:18.2%;
    background: url("../../Assets/Global/UserBackground.png");
    background-repeat:no-repeat;
    background-size:cover;
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
    bottom:15px;
    left:10%;
    color:white;
}

.LeftBarContent .LeftBarContent_NotesMark{
    position:absolute;
    padding:10%;
}

.LeftBarContent .LeftBarContent_Buttons{
    margin-top:200px;
    padding-left:5%;
    width:89%;
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

.NotesContent .CreateNoteContent{
    position:absolute;
    border-radius:20px;
    background-color:#f2edd3;
    width:25%;
    height:75vh;
    right:10px;
    top:-55px;
}

.NotesContent .CreateNoteContent .CreateNoteContent_PlusSign{
    border:solid #004c42;
    border-radius:900px;
    width:16px;
    margin-top:10px;
    margin-left:12px;
}
.NotesContent .CreateNoteContent .CreateNoteContent_PlusSign > h2{
    font-size:16px;
    margin-left:3.5px;
    color:#004c42;
}
.NotesContent .CreateNoteContent .CreateNoteContent_MyNotes > h2{
    position:relative;
    font-size:20px;
    left:40px;
    top:-22px;
    width:50%;
}
.NotesContent .CreateNoteContent .NewNoteInputs input,textarea{
    background-color:transparent;
    border:none;
    font-size:20px;
    margin-left:15px;
    width:80%;
}
.NotesContent .CreateNoteContent .NewNoteInputs input{
    border-bottom:solid rgba(0, 0, 0, .1);
}
.NotesContent .CreateNoteContent .NewNoteInputs input::placeholder,textarea::placeholder{
    color:rgba(0, 0, 0, .5);
}
.NotesContent .CreateNoteContent .NewNoteInputs > textarea{
    background: url("../../Assets/Global/MyNotesDescriptionLines.png");
    background-repeat:no-repeat;
    background-position:0px 35px;
    resize:none;
    overflow:hidden;
    line-height:7vh;
    margin-top:20px;
}

.NotesContent .CreateNoteContent .AddNoteBtn{
    position:absolute;
    background-color:#FE5300;
    border:none;
    border-radius:10px;
    bottom:10px;
    left:30px;
    width:80%;
    height:40px;
    color:white;
}
.NotesContent .CreateNoteContent .AddNoteBtn:hover{
    background-color:#db4800;
}
.NotesContent .CreateNoteContent .AddNoteBtn:active{
    background-color:#b83c00;
}
.Content .Notes{
    border:solid black;
    overflow:auto;
    width:73%;
    height:68vh;
}

