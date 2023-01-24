<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.php">
</head>
<body>
    <div class="a">
        <button class="b">aaaa</button>
    </div>
    <div>
            <?php 
            session_start();
            $maxUserNotesId = $_SESSION['maxUserNotesId'];
            $loginStatusData = $_SESSION['loginStatus'];
            $loginNameData = $_SESSION['loginName'];
            print_r($maxUserNotesId);

            
            if($loginStatusData === 1){
                echo "Welcome ". $loginNameData . " ";
                 echo "<form action='./Components/php/logout.php' method='post'>
                <input type='submit' value='Logout' name='logout'>
                </form>";
        } else{
                echo "<button onclick='btnClickLogIn()'>Login</button>";
        }

            ?>
    </div> 
    <div class="div1">
        <h1>Notes App</h1>
        <form action="./Components/php/usernotes.php" id="submitNote" method="post">
            <input id="noteTitle" name="noteTitle" type="text" placeholder="Input the title of your note">
            <input id="noteDescription" name="noteDescription" type="text" placeholder="Input the description of your note">
            <input type="submit" value="Submit">       
            <button></button>
    </form>
    </div>
    <div class="Notes">
    <?php   
        $loginStatusData = $_SESSION['loginStatus'];
        if($loginStatusData === 1) {
            include(__DIR__ . "./Components/php/bootstrap.php");
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
                    echo ("
                        <div>
                        <form action='./Components/php/clickNote.php' id='submitNote' method='post'>
                        <button class='Notebtn' type='submit' name='noteTitleValue' value='$i'>
                        <p> 
                        $showNoteTitle 
                        </p>
                        <p> 
                        $showNoteDescription
                        </p>
                        </button>
                        </form
                        </div>
                ");
                }   

            }
            
        }
                    
    ?>
    </div>
    <h1>Notes</h1>
    <div class="notes" id="notes">
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="index.js"></script>
        <script text="javascript">
            noteButtons = document.getElementsByClassName('Notebtn')
    for (let i = 0; i < noteButtons.length; i++) {
        noteButtons[i].onclick = function (e) {
        var noteButtonTitleValue = 2
        $.ajax({
            url:"./Components/php/clickNote.php",
            method:"POST",
            dataType:'text',
            data:{'noteButtonTitleValue' : noteButtonTitleValue},
            success: function(data){
                location.href = "./Components/php/clickNote.php"
            }
        })
    }
        //Buscar notetitlevalue en la base de datos y poner los valores en clicknote para que aparezcan alla correctamente.
    }
    </script>
</body>

</html>
