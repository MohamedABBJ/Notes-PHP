<?php 
include(__DIR__ . "../../DB/dbConection.php");
session_start();
$idUser = $_SESSION['iduser'];
$noteId = $_SESSION['noteId'];

$deleteNote = $db->exec("DELETE FROM `notes-app`.`notesuser($idUser)` WHERE (`idnotesuser` = '$noteId')");

if(isset($deleteNote)){
    echo("The note has been deleted!");
    echo("Redirecting...");
    header("refresh:2;url='../../index.php");
}

?>