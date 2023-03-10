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
    background: url("../Assets/Global/MyNotesDescriptionLines.png");
     background-blend-mode: overlay;
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