<?php
$config = parse_ini_file ("../../../../config.ini"); 
$connection = mysqli_connect($config["dbaddr"], $config["username"], $config["password"], $config["dbname"]);
if ($connection === false) {
    die("Database died!<br>");
}
else {
    echo  ("Database connected <br>");
}
?>