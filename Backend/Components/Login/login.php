<?php 
include(__DIR__ . "../../DB/dbConection.php");

$username = $_REQUEST['username'] ?? NULL;
$password = $_REQUEST['password'] ?? NULL;

if(empty($username) && empty($password)){

  echo("<script>alert('You cannot leave both inputs in blank!!')</script>");
  header("refresh:0;url='../../../Frontend/Components/logIn/login.html");

}else{
$loginQuery = $db->prepare("SELECT username AND password FROM `notes-app`.`users` WHERE username = :username AND password = :password");
$loginQuery->bindParam(':username', $username);
$loginQuery->bindParam(':password', $password);
$loginQuery->execute();


$idUserQuery = $db -> prepare("SELECT idusers FROM `notes-app`.`users` WHERE username = :username AND password = :password");
$idUserQuery->bindParam(':username', $username);
$idUserQuery->bindParam(':password', $password);
$idUserQuery->execute();
$idUser = $idUserQuery->fetchColumn();
session_start();
$_SESSION['iduser'] = $idUser;


if($login->rowCount() > 0 && $username !== NULL && $password !== NULL){
  $loggedInQuery = $db->prepare("UPDATE `notes-app`.`users` SET loggedstatus = 1 WHERE username = :username AND password = :password");
  $loggedInQuery->bindParam(':username', $username);
  $loggedInQuery->bindParam(':password', $password);
  $loggedInQuery->execute();

  $loginStatusQuery = $db -> prepare("SELECT loggedstatus FROM `notes-app`.`users` WHERE username = :username AND password = :password");
  $loginStatusQuery->bindParam(':username', $username);
  $loginStatusQuery->bindParam(':password', $password);
  $loginStatusQuery->execute();

  $loginNameQuery = $db -> prepare("SELECT name FROM `notes-app`.`users` WHERE username = :username AND password = :password");
  $loginNameQuery->bindParam(':username', $username);
  $loginNameQuery->bindParam(':password', $password);
  $loginNameQuery->execute();

  $maxUserNotesIdQuery = $db->prepare("SELECT MAX(idnotesuser) AS maxUserNotesId FROM `notes-app`.`notesuser($idUser)`");
  $maxUserNotesIdQuery->execute();
  $maxUserNotesIdQuery = $maxUserNotesIdQuery->fetch(PDO::FETCH_ASSOC);
  $maxUserNotesId = $maxUserNotesIdQuery['maxUserNotesId'];

  $loginStatus = $loginStatusQuery->fetchColumn();
  $loginName = $loginNameQuery->fetchColumn(); 
  $_SESSION['maxUserNotesId'] = $maxUserNotesId;
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
  $_SESSION['loginStatus'] = $loginStatus;
  $_SESSION['loginName'] = $loginName;

  echo 'You have been loged to the system welcome!';
  header("refresh:2;url='../../index.php");
  
}else if(isset($username)){
  echo 'Username or password are incorrect!';
}
}
?>