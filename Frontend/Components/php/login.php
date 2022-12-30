<?php 
include(__DIR__ . "/bootstrap.php");

$username = $_REQUEST['username'] ?? null;
$password = $_REQUEST['password'] ?? null;


$login = $db->prepare("SELECT username AND password FROM `notes-app`.`users` WHERE username = :username AND password = :password");
$login->bindParam(':username', $username);
$login->bindParam(':password', $password);
$login->execute();



if($login->rowCount() > 0 && $username !== NULL && $password !== NULL){
  $loggedIn = $db->prepare("UPDATE `notes-app`.`users` SET loggedstatus = 1 WHERE username = :username AND password = :password");
  $loggedIn->bindParam(':username', $username);
  $loggedIn->bindParam(':password', $password);
  $loggedIn->execute();
  $loginStatusQuery = $db -> prepare("SELECT loggedstatus FROM `notes-app`.`users` WHERE username = :username AND password = :password");
  $loginStatusQuery->bindParam(':username', $username);
  $loginStatusQuery->bindParam(':password', $password);
  $loginStatusQuery->execute();
  $loginNameQuery = $db -> prepare("SELECT name FROM `notes-app`.`users` WHERE username = :username AND password = :password");
  $loginNameQuery->bindParam(':username', $username);
  $loginNameQuery->bindParam(':password', $password);
  $loginNameQuery->execute();
  session_start();
  $loginStatus = $loginStatusQuery->fetchColumn();
  $loginName = $loginNameQuery->fetchColumn(); 
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
  $_SESSION['loginStatus'] = $loginStatus;
  $_SESSION['loginName'] = $loginName;
  print_r($loginStatus);
  echo 'You have been loged to the system welcome!';
  header("refresh:2;url='../../index.php");
}else if(isset($username)){
  echo 'Username or password are incorrect!';
}

?>