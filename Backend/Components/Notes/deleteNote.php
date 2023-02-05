<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../Global/globalStyle.php">
</head>
<body>
<?php 
include(__DIR__ . "../../DB/dbConection.php");
session_start();
$idUser = $_SESSION['iduser'];
$noteId = $_SESSION['noteId'];

$deleteNoteQuery = $db->exec("DELETE FROM `notes-app`.`notesuser($idUser)` WHERE (`idnotesuser` = '$noteId')");

if(isset($deleteNoteQuery)){
    echo("The note has been deleted!");
    echo("Redirecting...");
    header("refresh:2;url='../../index.php");
}

?>
</body>
</html>