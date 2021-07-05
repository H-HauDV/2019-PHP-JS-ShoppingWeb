function show_hide(userName)
{
    if (userName == "") {
                            
        document.getElementById("userName").style.display = "none";
        document.getElementById("logOut").style.display = "none";
    }
    else {
        document.getElementById("userName").style.display = "block";
        document.getElementById("login").style.display = "none";
        document.getElementById("logOut").style.display = "block";
    }
} 