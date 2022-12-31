<?php 
include(__DIR__ . "/bootstrap.php");

session_start();
$usernameData = $_SESSION['username'];
$passwordData = $_SESSION['password'];
$idUser = $_SESSION['iduser'];
$noteTitle = $_POST['noteTitle'];
$noteDescription = $_POST['noteDescription'];

if(isset($noteTitle) && isset($noteDescription) ){

    $createNote = $db -> exec("INSERT INTO `notes-app`.`notesuser($idUser)` (`notetitle`, `notedescription`) VALUES ('$noteTitle', '$noteDescription');");
    header("refresh:0;url=../../index.php");

}else if($noteTitle = "" || $noteDescription = ""){
    echo "
    <script text='javascript'>
    alert('incorrect value')
    </script>";
}



?>