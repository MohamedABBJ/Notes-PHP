<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include(__DIR__ . "/bootstrap.php");
    $noteId = $_POST['noteTitleValue'];
    session_start();
    $_SESSION['noteId'] = $noteId;
    $idUser = $_SESSION['iduser'];
    
    $searchNote = $db -> prepare("SELECT notetitle, notedescription FROM `notes-app`.`notesuser($idUser)` WHERE idnotesuser = $noteId");
    $searchNote->execute();
    $showSearchedNote = $searchNote->fetch();
    $showNoteTitle = $showSearchedNote[0];
    $showNoteDescription = $showSearchedNote[1];
    echo("
    <h1>Note Title</h1>
    $showNoteTitle
    <h2>Note description</h2>
    $showNoteDescription
    //Hacer que la nota sea editada y puesta tanto en la base de datos como en la pagina.
    "
    );
    ?>
    <button onclick="editTask()">Edit Task</button>
    <button onclick="deleteTask()">Delete Task</button>


    <script text="javascript">
        let editTask = () =>{
            location.href = "./editNote.php"
        }
        let deleteTask = () =>{
            deleteTaskOption = window.confirm("Are you sure that you want to delete this task?");
            if(deleteTaskOption){
                location.href = "./deleteNote.php"
            }
        }
    </script>
</body>
</html>