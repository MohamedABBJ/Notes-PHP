<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../Global/globalStyle.php">
    <link rel="stylesheet" type="text/css" href="../../style.php">
</head>

<body>
    <div class="TopBarContent">
        <?php
        session_start();
        $maxUserNotesId = $_SESSION['maxUserNotesId'] ?? NULL;
        $loginStatus = $_SESSION['loginStatus'] ?? NULL;
        $loginName = $_SESSION['loginName'] ?? NULL;


        if ($loginStatus === 1) {

            echo "
                    <div class='TopBarContent_WelcomeMessage'>
                    Welcome, " . $loginName . "!" . "
                    </div>
                    ";
        } else {
            echo "
                <button onclick='btnClickLogIn()'>Login</button>";
        }


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
                    <form action='./Components/LogOut/logout.php' method='post'>
                    <input type='submit' value='Logout' name='logout'>
                    </div>
                    </form>
                    <div class='LeftBarContent_Buttons'>
                    <button>
                    <p>Home</p>
                    <img src='../Assets/Index/HomeIcon.png' alt='' srcset=''>
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
    <div class="NotesContent">
        <div class="Content">
            <div class="Notes">
                <?php
                include(__DIR__ . "../../DB/dbConection.php");
                $noteId = $_POST['noteId'];
                $_SESSION['noteId'] = $noteId;
                $idUser = $_SESSION['iduser'];

                $searchNoteQuery = $db->prepare("SELECT notetitle, notedescription FROM `notes-app`.`notesuser($idUser)` WHERE idnotesuser = $noteId");
                $searchNoteQuery->execute();
                $searchNote = $searchNoteQuery->fetch();
                $noteTitle = $searchNote[0];
                $noteDescription = $searchNote[1];
                echo ("
                <h1>Note Title</h1>
                $noteTitle
                <h2>Note description</h2>
                $noteDescription
                    "
                );
                ?>
                <button onclick="editTask()">Edit Task</button>
                <button onclick="deleteTask()">Delete Task</button>
            </div>
        </div>
    </div>
    <script src="../Frontend/Components/Index/index.js"></script>
    <script src="../../../Frontend/Notes/clickNote/clickNote.js"></script>
    </script>

</body>
</html>
