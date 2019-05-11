<?php
include "loginphp.php";

if ($date1 < $date2 && $date1 > $date4 && $password == $reenterpassword && $row2 < 1) {
    echo"<script type='text/javascript'>
    alert('New user registered! You may now log in after page reload.');</script>";
    echo"<script type='text/javascript'>
    window.parent.location.href = 'login.php';</script>";
}

if ($password != $reenterpassword) {        
    echo"<script type='text/javascript'>
    alert('Passwords do not match.');</script>"; 
}

if ($row2 > 0) {
    echo"<script type='text/javascript'>
    alert('Username is already in use.');</script>"; 
} 

?>