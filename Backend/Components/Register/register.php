<?php 
    include("../DB/dbConection.php");
    $name = $_REQUEST['name'];
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $confirm_password = $_REQUEST['confirm_password'];


    $checkUsernameQuery = $db -> prepare("SELECT username FROM `notes-app`.`users` WHERE username = :username");
    $checkUsernameQuery->bindParam(':username', $username);
    $checkUsernameQuery->execute();
    $checkEmailQuery = $db -> prepare("SELECT email FROM `notes-app`.`users` WHERE email = :email");
    $checkEmailQuery->bindParam(':email', $email);
    $checkEmailQuery->execute();
    
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
    if($checkUsernameQuery -> rowCount() > 0 && $checkEmailQuery  -> rowCount() > 0){
        echo("<script>alert('The user $username and email $email are being used, please input another one')</script>");
        header("refresh:0;url='../../../Frontend/Components/Register/register.html");
    }else if ($checkUsernameQuery -> rowCount() > 0){ 
        echo("<script>alert('The user $username  already is being used, please input another one')</script>");
        header("refresh:0;url='../../../Frontend/Components/Register/register.html");
    }else if ($checkEmailQuery -> rowCount() > 0){
        echo("<script>alert('The email $email already is being used, please input another one')</script>");
        header("refresh:0;url='../../../Frontend/Components/Register/register.html");
    }else{

    $registro = $db->exec("INSERT INTO `notes-app`.`users` (`name`, `username`, `password`, `confirm_password`, `email`)
     VALUES ('$name','$username','$password','$confirm_password','$email')");
    
    $idUserQuery = $db -> prepare("SELECT idusers FROM `notes-app`.`users` WHERE username = :username AND password = :password");
    $idUserQuery->bindParam(':username', $username);
    $idUserQuery->bindParam(':password', $password);
    $idUserQuery->execute();
    $idUser = $idUserQuery->fetchColumn();

    $userTable = $db -> prepare("CREATE TABLE `notes-app`.`notesuser($idUser)` (
        `idnotesuser` INT NOT NULL AUTO_INCREMENT,
        `notetitle` VARCHAR(20) NULL,
        `notedescription` VARCHAR(45) NULL,
        PRIMARY KEY (`idnotesuser`))");
    

    $userSpecificTable = $userTable->execute();


     if($registro && isset($userSpecificTable)){
        echo "The register has been completed sucessfully! <br> <br>";
        echo "<button onclick='btn_Register()'>Go back to login</button>";
        echo " <script>
        btn_Register = () => {
            location.href = '../../../Frontend/Components/logIn/login.html'
        }
        </script>";
     }else{

     }
    }
}else{
    echo("<script>alert('The email has an invalid input please input a valid email')</script>");
    header("refresh:0;url='../../../Frontend/Components/Register/register.html");
}
?>