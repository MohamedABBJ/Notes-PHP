<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="../../Global/globalStyle.php">
  <link rel="stylesheet" type="text/css" href="../../Styles/Login/loginStyle.php">
</head>

<body>
  <?php
  include(__DIR__ . "../../DB/dbConection.php");

  $username = $_REQUEST['username'] ?? NULL;
  $password = $_REQUEST['password'] ?? NULL;

  $loginPasswordQuery = $db->prepare("SELECT password FROM `notes-app`.`users` WHERE username = :username");
  $loginPasswordQuery->bindParam(':username', $username);
  $loginPasswordQuery->execute();
  $loginPassword = $loginPasswordQuery->fetchColumn();

  if (empty($username) && empty($password)) {

    echo ("<script>alert('You cannot leave both inputs in blank!!')</script>");
    header("refresh:0;url='../../../Frontend/Components/logIn/login.html");
  } else if (password_verify($password, $loginPassword)) {
    $loginQuery = $db->prepare("SELECT username AND password FROM `notes-app`.`users` WHERE username = :username AND password = :password");
    $loginQuery->bindParam(':username', $username);
    $loginQuery->bindParam(':password', $loginPassword);
    $loginQuery->execute();


    $idUserQuery = $db->prepare("SELECT idusers FROM `notes-app`.`users` WHERE username = :username AND password = :password");
    $idUserQuery->bindParam(':username', $username);
    $idUserQuery->bindParam(':password', $loginPassword);
    $idUserQuery->execute();
    $idUser = $idUserQuery->fetchColumn();
    session_start();
    $_SESSION['iduser'] = $idUser;


    if ($loginQuery->rowCount() > 0 && $username !== NULL && $password !== NULL) {
      $loggedInQuery = $db->prepare("UPDATE `notes-app`.`users` SET loggedstatus = 1 WHERE username = :username AND password = :password");
      $loggedInQuery->bindParam(':username', $username);
      $loggedInQuery->bindParam(':password', $loginPassword);
      $loggedInQuery->execute();

      $loginStatusQuery = $db->prepare("SELECT loggedstatus FROM `notes-app`.`users` WHERE username = :username AND password = :password");
      $loginStatusQuery->bindParam(':username', $username);
      $loginStatusQuery->bindParam(':password', $loginPassword);
      $loginStatusQuery->execute();
      $loginStatus = $loginStatusQuery->fetchColumn();

      $loginNameQuery = $db->prepare("SELECT name FROM `notes-app`.`users` WHERE username = :username AND password = :password");
      $loginNameQuery->bindParam(':username', $username);
      $loginNameQuery->bindParam(':password', $loginPassword);
      $loginNameQuery->execute();
      $loginName = $loginNameQuery->fetchColumn();

      $maxUserNotesIdQuery = $db->prepare("SELECT MAX(idnotesuser) AS maxUserNotesId FROM `notes-app`.`notesuser($idUser)`");
      $maxUserNotesIdQuery->execute();
      $maxUserNotesIdQuery = $maxUserNotesIdQuery->fetch(PDO::FETCH_ASSOC);
      $maxUserNotesId = $maxUserNotesIdQuery['maxUserNotesId'];

      $_SESSION['maxUserNotesId'] = $maxUserNotesId;
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $loginPassword;
      $_SESSION['loginStatus'] = $loginStatus;
      $_SESSION['loginName'] = $loginName;

      echo 'You have been loged to the system welcome!';
      header("refresh:2;url='../../index.php");
    } else if (isset($username)) {
      echo 'Username or password are incorrect!';
      echo var_dump($password);
    }
  }
  ?>
</body>

</html>