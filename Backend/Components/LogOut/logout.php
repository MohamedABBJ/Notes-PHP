<?php 
include(__DIR__ . "../../DB/dbConection.php");
    session_start();
    $usernameData = $_SESSION['username'];
    $passwordData = $_SESSION['password'];
    
    $loggingOutQuery = $db->prepare("UPDATE `notes-app`.`users` SET loggedstatus = 0 WHERE username = :username AND password = :password");
    $loggingOutQuery->bindParam(':username', $usernameData);
    $loggingOutQuery->bindParam(':password', $passwordData);
    $loggingOutQuery->execute();
    $loginStatus = $loggingOutQuery->fetchColumn();
    $_SESSION['loginStatus'] = $loginStatus;


   echo 'Logging you out, see you next Time!';
   header("refresh:2;url='../../index.php");
    
    ?>