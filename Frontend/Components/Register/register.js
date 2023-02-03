let checkSubmit = () => {
    let password = document.getElementById('password').value
    let confirmPassword = document.getElementById('confirmPassword').value

    if(password.length < 6){
        alert("password needs to have at least 6 characters");
    }else{
        if(password === confirmPassword){
            return true;
        }else
            alert("passwords doesn't match");
            return false;
    }
    }