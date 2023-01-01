<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div>
            <?php 
            session_start();
            $loginStatusData = $_SESSION['loginStatus'];
            $loginNameData = $_SESSION['loginName'];
            $idUser = $_SESSION['iduser'];
            print_r($idUser);

            
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
        <form id="submitNote" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input id='noteTitle' name="noteTitle" type="text" placeholder="Input the title of your note">
            <input id="noteDescription" name="noteDescription" type="text" placeholder="Input the description of your note">
            <input type="submit" value="Submit">       
            </form>
    <div>
        <?php 
            include(__DIR__ . "/Components/php/bootstrap.php");
            $usernameData = $_SESSION['username'];
            $passwordData = $_SESSION['password'];
            $idUser = $_SESSION['iduser'];
            $noteTitle = $_POST['noteTitle'] ?? null;;
            $noteDescription = $_POST['noteDescription'] ?? null;

            $maxUserNotesIdQuery = $db -> prepare("SELECT MAX(idnotesuser) AS maxUserNotesId FROM `notes-app`.`notesuser($idUser)`");
            $maxUserNotesIdQuery -> execute();
            $maxUserNotesIdQuery = $maxUserNotesIdQuery -> fetch(PDO::FETCH_ASSOC);
            $maxUserNotesId = $maxUserNotesIdQuery['maxUserNotesId'];


            if(isset($showNotesDataFirstLog1) === false && $loginStatusData === 1){
                    $createNote = $db -> exec("INSERT INTO `notes-app`.`notesuser($idUser)` (`notetitle`, `notedescription`) VALUES ('$noteTitle', '$noteDescription');");
                    $showNotesData1 = "";
                    $showNotesData2 = "";
                    for ($i = 1; $i < $maxUserNotesId + 2; $i++) { 
                    $showNotesQuery = $db -> prepare("SELECT notetitle, notedescription FROM `notes-app`.`notesuser($idUser)` 
                                              WHERE idnotesuser = :idnotesuser");
                    $showNotesQuery->bindParam(':idnotesuser', $i);
                    $showNotesQuery->execute();
                    $showNotesData = $showNotesQuery->fetch();
                    $_SESSION['showNotesData'] = $showNotesData;
                    $showNotesData1 = $showNotesData[0];
                    $showNotesData2 = $showNotesData[1];
                    print_r($showNotesData1);
                    print_r($showNotesData2);
                
                }
            }else if($noteTitle = "" || $noteDescription = ""){
                echo "
                <script text='javascript'>
                alert('incorrect value')
                </script>";
            }
            ?>
    </div>

        <h1>Notes</h1>
        </div>
                <div class="notes" id="notes">
    </div>
    <script src="index.js"></script>
    <script text="javascript">
 
    </script>
</body>
</html>