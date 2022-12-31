<?php 
include(__DIR__ . "/bootstrap.php");

session_start();
$usernameData = $_SESSION['username'];
$passwordData = $_SESSION['password'];
$idUser = $_SESSION['iduser'];
$noteTitle = $_POST['noteTitle'] ?? null;;
$noteDescription = $_POST['noteDescription'] ?? null;

$maxUserNotesIdQuery = $db -> prepare("SELECT MAX(idnotesuser) AS maxUserNotesId FROM `notes-app`.`notesuser($idUser)`");
$maxUserNotesIdQuery -> execute();
$maxUserNotesIdQuery = $maxUserNotesIdQuery -> fetch(PDO::FETCH_ASSOC);
$maxUserNotesId = $maxUserNotesIdQuery['maxUserNotesId'];

$createNote = $db -> exec("INSERT INTO `notes-app`.`notesuser($idUser)` (`notetitle`, `notedescription`) VALUES ('$noteTitle', '$noteDescription');");
$showNotesData1 = "";
$showNotesData2 = "";


if(isset($noteTitle) && isset($noteDescription) ){
    for ($i = 1; $i < $maxUserNotesId + 2; $i++) { 
    print_r('si');
    $showNotesQuery = $db -> prepare("SELECT notetitle, notedescription FROM `notes-app`.`notesuser($idUser)` 
                              WHERE idnotesuser = :idnotesuser");
    $showNotesQuery->bindParam(':idnotesuser', $i);
    $showNotesQuery->execute();
    $showNotesData = $showNotesQuery->fetch();
    $showNotesData1 = $showNotesData[0];
    $showNotesData2 = $showNotesData[1];
    print_r($showNotesData1);
    print_r($showNotesData2);
    }
    header("refresh:5000;url=../../index.php");

}else if($noteTitle = "" || $noteDescription = ""){
    echo "
    <script text='javascript'>
    alert('incorrect value')
    </script>";
}



?>