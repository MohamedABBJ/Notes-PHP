btnClickLogIn = () => {
  location.href = "../Frontend/Components/logIn/login.html";
};

btnClickLogOut = () =>{
  logOutOption = window.confirm("Are you sure that you want to Log Out?");
  if(logOutOption){
      location.href = "../Backend/Components/LogOut/logout.php";
  }
}