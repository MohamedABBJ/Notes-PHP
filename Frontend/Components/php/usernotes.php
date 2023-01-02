<?php
include(__DIR__ . "./bootstrap.php");
session_start();
$idUser = $_SESSION['iduser'];
$noteTitle = $_POST['noteTitle'] ?? NULL;
$noteDescription = $_POST['noteDescription'] ?? NULL;

$maxUserNotesIdQuery = $db->prepare("SELECT MAX(idnotesuser) AS maxUserNotesId FROM `notes-app`.`notesuser($idUser)`");
$maxUserNotesIdQuery->execute();
$maxUserNotesIdQuery = $maxUserNotesIdQuery->fetch(PDO::FETCH_ASSOC);
$maxUserNotesId = $maxUserNotesIdQuery['maxUserNotesId'];
$_SESSION['maxUserNotesId'] = $maxUserNotesId;

$db->exec("INSERT INTO `notes-app`.`notesuser($idUser)` (`notetitle`, `notedescription`) VALUES ('$noteTitle', '$noteDescription')");

echo 'Loading...';
header("refresh:2;url='../../index.php");

?>