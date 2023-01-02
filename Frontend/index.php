<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<body>
    <div>
            <?php 
            session_start();
            $loginStatusData = $_SESSION['loginStatus'];
            $loginNameData = $_SESSION['loginName'];
            print_r($loginStatusData);

            
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
    <div id="div1">
        <h1 id="a">Notes App</h1>
        <form action="./Components/php/usernotes.php" id="submitNote" method="post">
            <input id="noteTitle" name="noteTitle" type="text" placeholder="Input the title of your note">
            <input id="noteDescription" name="noteDescription" type="text" placeholder="Input the description of your note">
            <input type="submit" value="Submit">       
            </form>
    </div>
    <div>
        <?php   
                include(__DIR__ . "./Components/php/bootstrap.php");
                $idUser = $_SESSION['iduser'];
                $showNotesData = $_SESSION['showNotesData'];
                $maxUserNotesId = $_SESSION['maxUserNotesId'];
                for ($i = 1; $i < $maxUserNotesId + 2; $i++) {
                    $showNotesQuery = $db->prepare("SELECT notetitle, notedescription FROM `notes-app`.`notesuser($idUser)` 
                                                      WHERE idnotesuser = :idnotesuser");
                    $showNotesQuery->bindParam(':idnotesuser', $i);
                    $showNotesQuery->execute();
                    $showNotesData = $showNotesQuery->fetch();
                    $showNotesData1 = $showNotesData[0];
                    $showNotesData2 = $showNotesData[1];
                    echo ("$showNotesData1");
                    echo ("$showNotesData2");
                }
        ?>
    </div>
    <h1>Notes</h1>
    <div class="notes" id="notes">
    </div>
    <script src="index.js"></script>
    <script text="javascript">
     
    </script>
</body>
</html>