<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editing Note</h1>
    <p>Leave title or description in blank if you don't want to edit it</p>
    <form action='' method="post">
        New title <input type="text" name="newTitle" value="" id=""><br>
        <br>
        New description <input type="text" name="newDescription" value="" id=""><br>
        <button type="submit">Edit Note</button>
    </form>
    <br>
    <button onclick="goBack()">Cancel</button>

    <?php 
    include(__DIR__ . "../../DB/dbConection.php");
    $newTitle = $_POST['newTitle'];
    $newDescription = $_POST['newDescription'];
    session_start();
    $idUser = $_SESSION['iduser'];
    $noteId = $_SESSION['noteId'];
    
    //Editing both
    if(!empty($newDescription) && !empty($newTitle)){
        $editNote = $db -> prepare("UPDATE `notes-app`.`notesuser($idUser)` SET `notetitle` = :noteTitle, `notedescription` = :noteDescription  WHERE idnotesuser = $noteId");
        $editNote->bindParam(':noteTitle', $newTitle);
        $editNote->bindParam(':noteDescription', $newDescription);
        $editNote->execute();
        echo("Note Title and Description has been edited successfully");
        echo("Wait a moment, redirecting...");
        header("refresh:2;url='../../index.php");
    }
    //Editing noteTitle
    else if(empty($newDescription) && !empty($newTitle)){
            $editNote = $db -> prepare("UPDATE `notes-app`.`notesuser($idUser)` SET `notetitle` = :noteTitle  WHERE idnotesuser = $noteId");
            $editNote->bindParam(':noteTitle', $newTitle);
            $editNote->execute();
            echo("Note Title has been edited successfully");
            echo("Wait a moment, redirecting...");
            header("refresh:2;url='../../index.php");
        }
        //Editing noteDescription
    else if(!empty($newDescription) && empty($newTitle)){
            $editNote = $db -> prepare("UPDATE `notes-app`.`notesuser($idUser)` SET `notedescription` = :noteDescription  WHERE idnotesuser = $noteId");
            $editNote->bindParam(':noteDescription', $newDescription);
            $editNote->execute();
            echo("Note Description has been edited successfully");
            echo("Wait a moment, redirecting...");
            header("refresh:2;url='../../index.php");
        }
    else{
        echo("<script>alert('You cannot leave both inputs in blank!, if you do not want to edit the note then click cancel')</script>");
    }
    ?>    

    <script text="javascript">
        let goBack = () =>{
            location.href = "../../index.php"
        }
    </script>
</body>
</html>