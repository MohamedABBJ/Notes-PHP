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
    include(__DIR__ . "../../DB/dbConection.php");
    $noteId = $_POST['noteId'];
    session_start();
    $_SESSION['noteId'] = $noteId;
    $idUser = $_SESSION['iduser'];
    
    $searchNoteQuery = $db -> prepare("SELECT notetitle, notedescription FROM `notes-app`.`notesuser($idUser)` WHERE idnotesuser = $noteId");
    $searchNoteQuery->execute();
    $searchNote = $searchNoteQuery->fetch();
    $noteTitle = $searchNote[0];
    $noteDescription = $showSearchedNote[1];
    echo("
    <h1>Note Title</h1>
    $noteTitle
    <h2>Note description</h2>
    $noteDescription
    "
    );
    ?>
    <button onclick="editTask()">Edit Task</button>
    <button onclick="deleteTask()">Delete Task</button>

    <script src="../../../Frontend/Notes/clickNote/clickNote.js"></script>
</body>
</html>