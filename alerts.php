<?php
include "loginphp.php";


if ($date1 < $date2 && $date1 > $date4 && $password == $reenterpassword && $row2 < 1) {
    /*echo"<script type='text/javascript'>
        document.getElementById('register_overlay').style.display = 'none';
    </script>";*/
    echo"<script type='text/javascript'>
    alert('Register succesful. You may now log in...bla bla');</script>";
    echo"<script type='text/javascript'>
    window.parent.location.href = 'login.php';</script>";
     
}

if ($password != $reenterpassword) {        
    echo"<script type='text/javascript'>
    alert('Passwords do not match...bla bla');</script>"; 
}

if ($row2 > 0) {
    echo"<script type='text/javascript'>
    alert('Username is in use...bla bla');</script>"; 
    /*
    echo'<script type="text/javascript">
    
    let loginTrue = false;

const loginAlert = () => {
    if(!loginTrue) {
        document.getElementById("login_alert").style.display = "flex";
        setTimeout(function () {
            document.getElementById("login_alert").style.opacity = "1";
        }, 100);
        loginTrue = true;
    } else {
        loginTrue = false;
    }
};

document.getElementById("login_button").addEventListener("click", loginAlert);

window.addEventListener("mouseup", function (event) {
    const login_alert = document.getElementById("login_alert");

    if (loginTrue == true && event.target != login_alert) {
        document.getElementById("login_alert").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("login_alert").style.display = "none";
        }, 100);
        loginTrue = false;
    }
});
    </script>';  */  
} 
?>