<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../Global/globalStyle.php">
    <link rel="stylesheet" type="text/css" href="../../Styles/Notes/clickNoteStyle.php">
</head>

<body>
    <div class="TopBarContent">
        <?php
            include(__DIR__ . "../../../Global/topBarContent.php");
        ?>
    </div>
    <div class='LeftBarContent'>
        <?php
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
                    <button class='ViewingNoteButton'>
                    <p>Viewing Note</p>
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
                $noteId = $_POST['noteId'] ?? NULL;
                $idUser = $_SESSION['iduser'];
                
                if($noteId === NULL){
                    $noteId = $_SESSION['noteId'];
                    $searchNoteQuery = $db->prepare("SELECT notetitle, notedescription FROM `notes-app`.`notesuser($idUser)` WHERE idnotesuser = $noteId");
                    $searchNoteQuery->execute();
                    $searchNote = $searchNoteQuery->fetch();
                    $noteTitle = $searchNote[0];
                    $noteDescription = $searchNote[1];
                    echo ("
                    <div class='NoteTitleAndDescription'>
                    <h2>Note Title</h2>
                    <h1>$noteTitle</h1>
                    <h2>Note description</h2>
                    <div class='NoteDescription'>
                    <textarea disabled name='' id='' cols='30' rows='10'>$noteDescription</textarea>  
                    </div>
                    </div>
                    "
                    );
                }else{
                    $_SESSION['noteId'] = $noteId;
                    $searchNoteQuery = $db->prepare("SELECT notetitle, notedescription FROM `notes-app`.`notesuser($idUser)` WHERE idnotesuser = $noteId");
                    $searchNoteQuery->execute();
                    $searchNote = $searchNoteQuery->fetch();
                    $noteTitle = $searchNote[0];
                    $noteDescription = $searchNote[1];
                    echo ("
                    <div class='NoteTitleAndDescription'>
                    <h2>Note Title</h2>
                    <h1>$noteTitle</h1>
                    <h2>Note description</h2>
                    <div class='NoteDescription'>
                    <textarea disabled name='' id='' cols='30' rows='10'>$noteDescription</textarea>  
                    </div>
                    </div>
                    "
                    );
                }

                ?>
                <div class="buttons">
                    <button onclick="editNote()">Edit Note</button>
                    <button onclick="deleteNote()">Delete Note</button>
                </div>
        </div>
        <script src="../../../Frontend/Components/Index/index.js"></script>
        <script src="../../../Frontend/Components/Global/globalScript.js"></script>
        <script src="../../../Frontend/Notes/clickNote/clickNote.js"></script>

</body>
</html>
