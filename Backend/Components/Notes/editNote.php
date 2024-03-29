<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../Global/globalStyle.php">
    <link rel="stylesheet" type="text/css" href="../../Styles/Notes/editNoteStyle.php">
</head>
<body>
    <div class="TopBarContent">
        <?php
            include(__DIR__ . "../../../Global/topBarContent.php");
        ?>
    </div>
    <div class='LeftBarContent'>
        <?php
        $noteId = $_SESSION['noteId'];
        if ($loginStatus === 1) {
            echo "
                    <div class='LeftBarContent_NotesMark'>
                    <img src='../Assets/Index/Logo.png' alt='' srcset=''>
                    </div>
                    <div class='LeftBarContent_LogoutButton'>
                    <button onclick='btnClickLogOut()'>Logout</button>
                    </div>
                    </form>
                    <div class='LeftBarContent_Buttons'>
                    <button class='HomeButton' onclick='btnClickHome()'>
                    <p>My notes</p>
                    <img>
                    </button>
                    <form action='./clickNote.php' id='submitNote' method='post'>
                    <button class='ViewingNoteButton' type='submit' name='noteId' value='$noteId'>
                    <p>View Note</p>
                    <img>
                    </form>
                    </button>
                    <button class='EditingNoteButton'>
                    <p>Editing Note</p>
                    <p class='HomeIcon'></p>
                    <img>
                    </button>
                    </div>";
            echo
            "<div class='LeftBarContent_Username'>
                    Hello, $loginName  
                    </div>";
        } else {
            echo "
                <button onclick='btnClickLogIn()'>Login</button>";
        }

        ?>
    </div>
    <div class="Content">
                <?php
                include(__DIR__ . "../../DB/dbConection.php");
                $noteId = $_SESSION['noteId'];
                $idUser = $_SESSION['iduser'];

                $searchNoteQuery = $db->prepare("SELECT notetitle, notedescription FROM `notes-app`.`notesuser($idUser)` WHERE idnotesuser = $noteId");
                $searchNoteQuery->execute();
                $searchNote = $searchNoteQuery->fetch();
                $noteTitle = $searchNote[0];
                $noteDescription = $searchNote[1];
                $_SESSION['noteTitle'] = $noteTitle;
                $_SESSION['noteDescription'] = $noteDescription;
                echo ("
                <div id='NoteTitleAndDescription' class='NoteTitleAndDescription'> 
                <div id='NoteTitleAndDescriptionContent'>
                <h2>New Title</h2>
                <form action='' method='post'>
                <input type='text' name='newTitle' value='$noteTitle' id='newTitle'><br>
                <h2>New description</h2>
                <div class='NoteDescription'>
                <textarea name='newDescription' value='$noteDescription' id='newDescription' cols='30' rows='10'>$noteDescription</textarea>  <br>
                </div>
                <div class='buttons'>
                <br><button type='submit' class='editBtn'>Edit</button>
                </div>
                </form>
                </div>
                </div>
                "
                );
                ?>
                <div id="button_cancel" class="buttons">
                    <button class="cancelBtn" onclick="btnClickCancel()">Cancel</button>
                </div>
             <br>
    </div>
    <?php 
    include(__DIR__ . "../../DB/dbConection.php");
    $newTitle = $_POST['newTitle'] ?? NULL;
    $newDescription = $_POST['newDescription'] ?? NULL;
    $idUser = $_SESSION['iduser'] ?? NULL;
    $noteId = $_SESSION['noteId'] ?? NULL;
    $noteTitle = $_SESSION['noteTitle'] ?? NULL;
    $noteDescription = $_SESSION['noteDescription'] ?? NULL;
    
    echo("<script>
    let removeElements = () =>{
    NoteTitleAndDescriptionContent = document.getElementById('NoteTitleAndDescriptionContent');
    NoteTitleAndDescriptionContent.remove();
    button_cancel = document.getElementById('button_cancel');
    button_cancel.remove();
    }

    let addElementsBothEdited = () =>{
        noteEditedDiv = document.createElement('div');
        noteEditedDiv.setAttribute('class', 'NoteEdited');
        noteEditedMsg = document.createElement('h1');
        noteEditedMsgTextNode = document.createTextNode('Note title and description has been edited successfully');
        noteEditedMsg.appendChild(noteEditedMsgTextNode);
        noteEditedDiv.appendChild(noteEditedMsg);
        redirectingMsg = document.createElement('h2');
        redirectingMsgTextNode = document.createTextNode('Wait a moment, redirecting...');
        redirectingMsg.appendChild(redirectingMsgTextNode);
        noteEditedDiv.appendChild(redirectingMsg);
        noteTitleAndDescriptionElement = document.getElementById('NoteTitleAndDescription');
        noteTitleAndDescriptionElement.appendChild(noteEditedDiv);
    }
    let addElementsNoteTitleEdited = () =>{
        noteEditedDiv = document.createElement('div');
        noteEditedDiv.setAttribute('class', 'NoteEdited');
        noteEditedMsg = document.createElement('h1');
        noteEditedMsgTextNode = document.createTextNode('Note title has been edited successfully');
        noteEditedMsg.appendChild(noteEditedMsgTextNode);
        noteEditedDiv.appendChild(noteEditedMsg);
        redirectingMsg = document.createElement('h2');
        redirectingMsgTextNode = document.createTextNode('Wait a moment, redirecting...');
        redirectingMsg.appendChild(redirectingMsgTextNode);
        noteEditedDiv.appendChild(redirectingMsg);
        noteTitleAndDescriptionElement = document.getElementById('NoteTitleAndDescription');
        noteTitleAndDescriptionElement.appendChild(noteEditedDiv);
    }
    let addElementsNoteDescriptionEdited = () =>{
        noteEditedDiv = document.createElement('div');
        noteEditedDiv.setAttribute('class', 'NoteEdited');
        noteEditedMsg = document.createElement('h1');
        noteEditedMsgTextNode = document.createTextNode('Note Description has been edited successfully');
        noteEditedMsg.appendChild(noteEditedMsgTextNode);
        noteEditedDiv.appendChild(noteEditedMsg);
        redirectingMsg = document.createElement('h2');
        redirectingMsgTextNode = document.createTextNode('Wait a moment, redirecting...');
        redirectingMsg.appendChild(redirectingMsgTextNode);
        noteEditedDiv.appendChild(redirectingMsg);
        noteTitleAndDescriptionElement = document.getElementById('NoteTitleAndDescription');
        noteTitleAndDescriptionElement.appendChild(noteEditedDiv);
    }
    
    </script>");

    //Editing both
    if(isset($newDescription) && isset($newTitle) && $newDescription !== $noteDescription && $newTitle !== $noteTitle){
        $editNoteDescriptionQuery = $db -> prepare("UPDATE `notes-app`.`notesuser($idUser)` SET `notetitle` = :noteTitle, `notedescription` = :noteDescription  WHERE idnotesuser = $noteId");
        $editNoteDescriptionQuery->bindParam(':noteTitle', $newTitle);
        $editNoteDescriptionQuery->bindParam(':noteDescription', $newDescription);
        $editNoteDescriptionQuery->execute();
        session_start();
        $_SESSION['noteId'] = $noteId;
        echo("<script>
        removeElements();
        addElementsBothEdited();
        setTimeout(function() { window.location = './clickNote.php'; }, 2000);
        </script>");
    }
    //Editing noteTitle
    else if(isset($newDescription) && isset($newTitle) && $newDescription === $noteDescription && $newTitle !== $noteTitle ){
            $editNoteQuery = $db -> prepare("UPDATE `notes-app`.`notesuser($idUser)` SET `notetitle` = :noteTitle  WHERE idnotesuser = $noteId");
            $editNoteQuery->bindParam(':noteTitle', $newTitle);
            $editNoteQuery->execute();
            session_start();
            $_SESSION['noteId'] = $noteId;
            echo("<script>
            removeElements();
            addElementsNoteTitleEdited();
            setTimeout(function() { window.location = './clickNote.php'; }, 2000);
            </script>");
        }
        //Editing noteDescription
    else if(isset($newDescription) && isset($newTitle) && $newDescription !== $noteDescription && $newTitle === $noteTitle){
            $editDescriptionQuery = $db -> prepare("UPDATE `notes-app`.`notesuser($idUser)` SET `notedescription` = :noteDescription  WHERE idnotesuser = $noteId");
            $editDescriptionQuery->bindParam(':noteDescription', $newDescription);
            $editDescriptionQuery->execute();
            session_start();
            $_SESSION['noteId'] = $noteId;
            echo("<script>
            removeElements();
            addElementsNoteDescriptionEdited();
            setTimeout(function() { window.location = './clickNote.php'; }, 2000);
            </script>");
            
        }
    else if(isset($newDescription) && isset($newTitle) && $newDescription === $noteDescription && $newTitle === $noteTitle){
        echo("<script>alert('You did not edit anything!, if you do not want to edit the note then click cancel')</script>");
    }
    ?>    
    <script src="../../../Frontend/Notes/EditNote/editNote.js"></script>
    <script src="../../../Frontend/Components/Global/globalScript.js"></script>
    <script src="../../../Frontend/Components/Index/index.js"></script>
    <script src="../../../Frontend/Notes/ClickNote/clickNote.js"></script>
</body>
</html>