<?php

/* CONNECT TO SERVER */
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}

/* LOGIN FORM */
$username_login = $_POST["user_name"];
$password_login = $_POST["user_password"]; 
  
$sql_check_username = "SELECT * FROM user_profile WHERE username = '$username_login';";  
$result = mysqli_query($connection, $sql_check_username); 
$roww = mysqli_fetch_assoc($result);
$pass_form = $_POST["user_password"];
$password_hashed_from_database = $roww['hashed_password'];
$compare_password = password_verify($pass_form, $password_hashed_from_database); 

if (($roww['username'] == $username_login) && ($compare_password == 1)) {
    if(!headers_sent()) { 
        echo"<script type='text/javascript'>
        window.parent.location.href = 'dashboard.php';
        </script>";
    }
}

/* REGISTER FORM */
$date_of_birth_check = $_POST["register_age"]; 
$date1 = new DateTime($date_of_birth_check);
$date2 = new DateTime("today");
$date3 = new DateTime("today");
$date4 = $date3->modify("-124 years");

if ($date1 < $date2 && $date1 > $date4) {
    $username = mysqli_real_escape_string($connection, $_POST["register_name"]);
    $password = mysqli_real_escape_string($connection, $_POST["register_password"]);
    $email = mysqli_real_escape_string($connection, $_POST["register_email"]);
    $date_of_birth = mysqli_real_escape_string($connection, $_POST["register_age"]);
    $weight = mysqli_real_escape_string($connection, $_POST["register_weight"]);
    $height = mysqli_real_escape_string($connection, $_POST["register_height"]);
    $reenterpassword = mysqli_real_escape_string($connection, $_POST["register_password_re"]);
    
    if ($password == $reenterpassword) {        
        $sql_check_username = "SELECT * FROM user_profile WHERE username = '$username';";
        $result2 = mysqli_query($connection, $sql_check_username); 
        $row2 =mysqli_num_rows($result2); 

        if ($row2 < 1) { 
            $inputtohashing = $_POST["register_password"];
            $hashed_password = password_hash($inputtohashing, PASSWORD_DEFAULT);
            $compare_password = password_verify($inputtohashing, $hashed_password);
            $sql_insert = "INSERT INTO user_profile (username, password, email, date_of_birth, weight, height, hashed_password ) VALUES ('$username', '$password', '$email', '$date_of_birth', '$weight', '$height', '$hashed_password');";
            $result = mysqli_query($connection, $sql_insert);
        }
    }              
} 
?>