<?php 
    session_start();
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