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
?>