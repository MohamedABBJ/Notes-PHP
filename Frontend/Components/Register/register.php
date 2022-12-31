<?php 
    include("../php/bootstrap.php");
    $name = $_REQUEST['name'];
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $confirm_password = $_REQUEST['confirm_password'];

    $registro = $db->exec("INSERT INTO `notes-app`.`users` (`name`, `username`, `password`, `confirm_password`, `email`)
     VALUES ('$name','$username','$password','$confirm_password','$email')");
     
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
            location.href = '../Login/login.html'
        }
        </script>";
     }else{

     }

?>