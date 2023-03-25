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
    include("../DB/dbConection.php");
    $name = $_REQUEST['name'];
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $confirm_password = $_REQUEST['confirmPassword'];

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $hashConfirmPassword = password_hash($confirm_password, PASSWORD_DEFAULT);

    $checkUserQuery = $db -> prepare("SELECT username FROM `notes-app`.`users` WHERE username = :username");
    $checkUserQuery->bindParam(':username', $username);
    $checkUserQuery->execute();
    $checkEmailQuery = $db -> prepare("SELECT email FROM `notes-app`.`users` WHERE email = :email");
    $checkEmailQuery->bindParam(':email', $email);
    $checkEmailQuery->execute();
    
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
    if(strlen($password) < 6 || strlen($confirm_password) < 6){
        echo("<script>alert('password needs to have at least 6 characters')</script>");
        header("refresh:0;url='../../../Frontend/Components/Register/register.html");
    }else{
    if($password !== $confirm_password){
            echo("<script>alert('passwords does not match')</script>");
            header("refresh:0;url='../../../Frontend/Components/Register/register.html");
        }
    else{
    if($checkUserQuery -> rowCount() > 0 && $checkEmailQuery  -> rowCount() > 0){
        echo("<script>alert('The user $username and email $email are being used, please input another one')</script>");
        header("refresh:0;url='../../../Frontend/Components/Register/register.html");
    }else if ($checkUserQuery -> rowCount() > 0){ 
        echo("<script>alert('The user $username  already is being used, please input another one')</script>");
        header("refresh:0;url='../../../Frontend/Components/Register/register.html");
    }else if ($checkEmailQuery -> rowCount() > 0){
        echo("<script>alert('The email $email already is being used, please input another one')</script>");
        header("refresh:0;url='../../../Frontend/Components/Register/register.html");
    }else{

    $registerUserQuery = $db->exec("INSERT INTO `notes-app`.`users` (`name`, `username`, `password`, `confirm_password`, `email`)
     VALUES ('$name','$username','$hashPassword','$hashConfirmPassword','$email')");
    
    $idUserQuery = $db -> prepare("SELECT idusers FROM `notes-app`.`users` WHERE username = :username AND password = :password");
    $idUserQuery->bindParam(':username', $username);
    $idUserQuery->bindParam(':password', $hashPassword);
    $idUserQuery->execute();
    $idUser = $idUserQuery->fetchColumn();


    $createUserTableQuery = $db -> prepare("CREATE TABLE `notes-app`.`notesuser($idUser)` (
        `idnotesuser` INT NOT NULL AUTO_INCREMENT,
        `notetitle` VARCHAR(20) NULL,
        `notedescription` VARCHAR(150) NULL,
        PRIMARY KEY (`idnotesuser`))");
    $userTable = $createUserTableQuery->execute();


     if(isset($registerUserQuery) && isset($userTable)){
        echo "The register has been completed sucessfully! <br> <br>";
        echo "<button onclick='btn_Register()'>Go back to login</button>";
        echo " <script>
        btn_Register = () => {
            location.href = '../../../Frontend/Components/logIn/login.html'
        }
        </script>";
     }else{

     }
    }}}
}else{
    echo("<script>alert('The email has an invalid input please input a valid email')</script>");
    header("refresh:0;url='../../../Frontend/Components/Register/register.html");
}

?>
    
</body>
</html>