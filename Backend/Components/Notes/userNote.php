<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include(__DIR__ . "../../DB/dbConection.php");
session_start();
$idUser = $_SESSION['iduser'];
$noteTitle = $_POST['noteTitle'] ?? NULL;
$noteDescription = $_POST['noteDescription'] ?? NULL;

$db->exec("INSERT INTO `notes-app`.`notesuser($idUser)` (`notetitle`, `notedescription`) VALUES ('$noteTitle', '$noteDescription')");

$maxUserNotesIdQuery = $db->prepare("SELECT MAX(idnotesuser) AS maxUserNotesId FROM `notes-app`.`notesuser($idUser)`");
$maxUserNotesIdQuery->execute();
$maxUserNotesIdQuery = $maxUserNotesIdQuery->fetch(PDO::FETCH_ASSOC);
$maxUserNotesId = $maxUserNotesIdQuery['maxUserNotesId'];
$_SESSION['maxUserNotesId'] = $maxUserNotesId;

header("refresh:0;url='../../index.php");

?>
</body>
</html>
