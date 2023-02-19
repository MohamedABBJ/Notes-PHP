<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./Global/globalStyle.php">
    <link rel="stylesheet" type="text/css" href="style.php">
</head>
<body>
    <div class="TopBarContent">
    <?php 
            session_start();
            $maxUserNotesId = $_SESSION['maxUserNotesId'] ?? NULL;
            $loginStatus = $_SESSION['loginStatus'] ?? NULL;
            $loginName = $_SESSION['loginName'] ?? NULL;
            
            
                if($loginStatus === 1){
                
                    echo "
                    <div class='TopBarContent_WelcomeMessage'>
                    Welcome, ". $loginName . "!"."
                    </div>
                    "
                    
                    ;
            }
         else{
                echo "
                <button onclick='btnClickLogIn()'>Login</button>";
        }
            

            ?>
    </div>
    <div class='LeftBarContent'>
    <?php     
                if($loginStatus === 1){
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
                    </div>"
                    ;
                    echo 
                    "<div class='LeftBarContent_Username'>
                    Hello, $loginName  
                    </div>";
            }
         else{
                echo "
                <button onclick='btnClickLogIn()'>Login</button>";
        }

            ?>
    </div>
<div class="NotesContent">
    <div class="CreateNoteContent">
            <?php 
            
                if($loginStatus === 1){
                    echo "
                    <div class='CreateNoteContent_PlusSign'>
                    <h2>+</h2>
                    </div>
                    <div class = 'CreateNoteContent_MyNotes'>
                    <h2>New Note</h1>
                    </div>
                    <form action='./Components/Notes/userNote.php' id='submitNote' method='post'>
                    <div class='NewNoteInputs'>
                        <input maxlength='20' class='NoteTitle' id='noteTitle' name='noteTitle' type='text' placeholder='Title'>
                        <textarea rows='6' maxlength='124' class='NoteDescription'id='noteDescription' name='noteDescription' type='text' placeholder='Enter Details'></textarea>
                    </div>  
                        <input class='AddNoteBtn' type='submit' value='Add New Note'>       
                    </form>
                    ";
            }
         else{
                echo "
                <h1>You have to log in first!</h1>";
        }
            

        ?>
    </div>
    <div class="Content">
        <div class="Notes">
    <?php   
        $loginStatus = $_SESSION['loginStatus'] ?? NULL;
        if($loginStatus === 1) {
            include(__DIR__ . "./Components/DB/dbConection.php");
            $idUser = $_SESSION['iduser'];
            $maxUserNotesId = $_SESSION['maxUserNotesId'];
            for ($i = 1; $i < $maxUserNotesId + 1; $i++){
                $showNotesQuery = $db->prepare("SELECT notetitle, notedescription FROM `notes-app`.`notesuser($idUser)` 
                                                  WHERE idnotesuser = :idnotesuser");
                $showNotesQuery->bindParam(':idnotesuser', $i);
                $showNotesQuery->execute();
                $showNotesData = $showNotesQuery->fetch();
                if(!empty($showNotesData)){
                    $showNoteTitle = $showNotesData[0];
                    $showNoteDescription = $showNotesData[1];
                    echo "
                        <div class='content'>
                        <form action='./Components/Notes/clickNote.php' id='submitNote' method='post'>
                        <button class='Notebtn' type='submit' name='noteId' value='$i'>
                        <p> 
                        $showNoteTitle 
                        </p>
                        <p> 
                        $showNoteDescription
                        </p>
                        </button>
                        </form>
                        </div>"; 

            }
            
        }
    }
                    
    ?>
        </div>
    </div>
</div>
        <script src="../Frontend/Components/Index/index.js"></script>
    </script>

</body>

</html>
