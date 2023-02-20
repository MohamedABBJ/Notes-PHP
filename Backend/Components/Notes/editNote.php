<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../Global/globalStyle.php">
</head>
<body>
    <h1>Editing Note</h1>
    <p>Leave title or description in blank if you don't want to edit it</p>
    <form action='' method="post">
        New title <input type="text" name="newTitle" value="" id="newTitle"><br>
        <br>
        New description <input type="text" name="newDescription" id="newDescription" value=""><br>
        <button type="submit">Edit Note</button>
    </form>
    <br>
    <button onclick="cancel()">Cancel</button>

    <?php 
    include(__DIR__ . "../../DB/dbConection.php");
    $newTitle = $_POST['newTitle'] ?? NULL;
    $newDescription = $_POST['newDescription'] ?? NULL;

    session_start();
    $idUser = $_SESSION['iduser'] ?? NULL;
    $noteId = $_SESSION['noteId'] ?? NULL;
    
    
    echo("<script>
    let disableInputs = () =>{
    newTitle = document.getElementById('newTitle');
    newTitle.setAttribute('disabled', '');
    newDescription = document.getElementById('newDescription');
    newDescription.setAttribute('disabled', '');}
    </script>");

    //Editing both
    if(!empty($newDescription) && !empty($newTitle)){
        $editNoteDescriptionQuery = $db -> prepare("UPDATE `notes-app`.`notesuser($idUser)` SET `notetitle` = :noteTitle, `notedescription` = :noteDescription  WHERE idnotesuser = $noteId");
        $editNoteDescriptionQuery->bindParam(':noteTitle', $newTitle);
        $editNoteDescriptionQuery->bindParam(':noteDescription', $newDescription);
        $editNoteDescriptionQuery->execute();
        echo("<script>
        disableInputs();
        </script>");
        echo("Note title and description has been edited successfully <br>");
        echo("Wait a moment, redirecting...");
        header("refresh:2;url='../../index.php");
    }
    //Editing noteTitle
    else if(empty($newDescription) && !empty($newTitle)){
            $editNoteQuery = $db -> prepare("UPDATE `notes-app`.`notesuser($idUser)` SET `notetitle` = :noteTitle  WHERE idnotesuser = $noteId");
            $editNoteQuery->bindParam(':noteTitle', $newTitle);
            $editNoteQuery->execute();
            echo("<script>
            disableInputs();
            </script>");
            echo("Note title has been edited successfully");
            echo("Wait a moment, redirecting...");
            header("refresh:2;url='../../index.php");
        }
        //Editing noteDescription
    else if(!empty($newDescription) && empty($newTitle)){
            $editDescriptionQuery = $db -> prepare("UPDATE `notes-app`.`notesuser($idUser)` SET `notedescription` = :noteDescription  WHERE idnotesuser = $noteId");
            $editDescriptionQuery->bindParam(':noteDescription', $newDescription);
            $editDescriptionQuery->execute();
            echo("<script>
            disableInputs();
            </script>");
            echo("Note description has been edited successfully");
            echo("Wait a moment, redirecting...");
            header("refresh:2;url='../../index.php");
        }
    else if(isset($newDescription) && isset($newTitle) && empty($newDescription) && empty($newTitle)){
        echo("<script>alert('You cannot leave both inputs in blank!, if you do not want to edit the note then click cancel')</script>");
    }
    ?>    
    <script src="../../../Frontend/Notes/userNote/editNote.js"></script>
</body>
</html>