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

   header("refresh:0;url='../../index.php");
    
    ?>