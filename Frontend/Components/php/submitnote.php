<?php 
session_start();
$usernameData = $_SESSION['username'];
$passwordData = $_SESSION['password'];
$noteTitle = $_REQUEST['noteTitle'];
$noteDescription = $_REQUEST['noteDescription'];

?>