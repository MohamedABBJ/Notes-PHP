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
            
            echo $loginStatusData;
            
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

        <form action="./Components/php/submitnote.php" method="post">
        <input id='noteTitle' name="noteTitle" type="text" placeholder="Input the title of your note">
        <input id="noteDescription" name="noteDescription" type="text" placeholder="Input the description of your note">
        <input type="submit" value="Submit">       
        </form>

        <h1>Notes</h1>
    </div>
    <div class="notes" id="notes">
    </div>
    <script src="index.js"></script>
</body>
</html>