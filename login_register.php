<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>North Beat - Login</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500" rel="stylesheet">
</head>

<body>
    <main>
        <nav id="navbar_desktop">
            <ul>
                <li id="nav_about">
                    <h5>About</h5>
                </li>
                <li id="nav_login">
                    <h5>Log In</h5>
                </li>
                <li id="nav_contact">
                    <h5>Contact</h5>
                </li>
            </ul>
        </nav>
        <header id="main_header">
            <div id="logo_large"></div>
            <h1 class="north_beat_title">NORTH BEAT</h1>
            <hr id="title_hr">
            <h3 class="meta_h3">BY ATHLETES FOR ATHLETES</h3>
            <p>
                Join thousands of users on a journey to get in the shape of your life through the beats of music.
                North
                Beat was designed to help you motivate yourself to keep pushing for that extra kilometer and never give
                up!
            </p>
            <div id="action_logos">
                <div class="action_container">
                    <div class="action_container_overlay">
                        <i class="fas fa-headphones-alt"></i>
                        <h3 class="action_container_overlay_h3">MUSIC</h3>
                        <p id="overlay_p">Lorem ipsum, dolor sit amet consectetur adipisicing elit. And then some more text to fill this space a bit</p>
                        <button type="button" class="action_container_button">SIGN IN</button>
                    </div>
                </div>
                <div class="action_container">
                    <div class="action_container_overlay">
                        <i class="fas fa-user"></i>
                        <h3 class="action_container_overlay_h3">SOCIAL</h3>
                        <p id="overlay_p">Lorem ipsum, dolor sit amet consectetur adipisicing elit. And then some more text to fill this space a bit</p>
                        <button type="button" class="action_container_button">SIGN IN</button>
                    </div>
                </div>
                <div class="action_container">
                    <div class="action_container_overlay">
                        <i class="fas fa-heartbeat"></i>
                        <h3 class="action_container_overlay_h3">DATA</h3>
                        <p id="overlay_p">Lorem ipsum, dolor sit amet consectetur adipisicing elit. And then some more text to fill this space a bit</p>
                        <button type="button" class="action_container_button">SIGN IN</button>
                    </div>
                </div>
            </div>
            <h4 id="call_to_action_h4"><span>SIGN IN <i class="fas fa-arrow-down"></i>REGISTER</span></h4>

        </header>

        <section id="main_login_section_container">
            <div id="main_login_section">
                <div id="login_section_left">
                    <div id="logo_small"></div>
                </div>
                <div id="login_section_right">
                    <header id="login_section_header">
                        <h2 class="north_beat_title">NORTH BEAT</h2>
                    </header>
                    <form method="post" action="login.php">
                        <label for="user_name"><i class="fas fa-user-circle"></i>USERNAME</label>
                        <input id="user_name" type="text" name="user_name" placeholder="Username" required>
                        <label for="user_password"><i class="fas fa-unlock-alt"></i>PASSWORD</label>
                        <input id="user_password" type="password" name="user_password" placeholder="Password" required>
                        <br>
                        <button type="submit" id="login_button" onclick="">SIGN IN</button>
                        <button type="reset" id="reset">RESET</button>
                    </form>
                    <footer id="login_section_footer">
                        <h4 id="register_open"><span>Register</span></h4>
                        <h4 id="help_h4"><span>Help</span></h4>
                    </footer>
                    <?php
                    include_once 'includes/db_check_connection.php';
                    session_start();
                    ?>
                </div>
                <div id="alert">
                    <h2 class="overlay_h2">WARNING!</h2>
                    <p class="overlay_p">Incorrect login credentials. Please read the login help and follow the
                        instructions given. New user registration is not in use yet It will be activated in the future.</p>
                    <button id="alert_close_button">CLOSE ALERT</button>
                </div>
                <!--register under work-->
                <section id="help_overlay">
                    <div class="extra_container">
                        <h2 class="overlay_h2">LOGIN HELP</h2>
                        <p class="overlay_p">In order to log in, use the login credentials provided below:
                            <br>
                            <br><strong>USERNAME:</strong> placeholder
                            <br><strong>PASSWORD:</strong> placeholder
                            <br>
                            <br>
                            If you have further problems with logging in, please contact the developers for
                            instructions
                            (this message is directed to those, who know who the developers are) and help.
                        </p>

                        <button id="help_close_button">CLOSE HELP</button>
                    </div>
                </section>
            </div>
            <!-- LOGIN FORM FUNCTIONS BEGIN-->
        <?php
                  $username_login = $_POST["user_name"];
                  $password_login = $_POST["user_password"]; 
                    /*------------------------------------------------------------*/
                    $sql_check_username = "SELECT * FROM user_profile WHERE username = '$username_login';"; 
                    $result = mysqli_query($connection, $sql_check_username); 
                    echo ("LOGIN FORM SYÖTTÖKENTÄN TIEDOT: " ."<br>");
                    echo ("Tässäpä syöttökenttään syöttämäsi username: " . $_POST["user_name"]."<br>");
                    echo ("Tässäpä syöttökenttään syöttämäsi password: " . $_POST["user_password"]  ."<br><br>");
                    echo ("---------------------------------------------------------------------------------------------------- "  ."<br><br>");
                    $roww = mysqli_fetch_assoc($result);
                    $pass_form = $_POST["user_password"];
                    $password_hashed_from_database = $roww['hashed_password'];
                    $compare_password = password_verify($pass_form, $password_hashed_from_database); 
                    if (($roww['username'] == $username_login) && ($compare_password == 1)) {  
                        echo ("LOGINFORM SYÖTTÖKENTÄN USERNAMEA VASTAAVAT TIETOKANNAN KENTÄT: " ."<br>");
                        echo "Databasesta löytynyt USERNAME on: " .$roww['username'] ."<br>";
                        echo "Databasesta löytynyt PASSWORD on: " .$roww['password'] ."<br>";
                        echo "Databasesta löytynyt E-MAIL on: " .$roww['email'] ."<br>";
                        echo ("Databasesta löytynyt DATE OF BIRTH on: " .$roww['date_of_birth'] . "<br>");
                        echo ("Databasesta löytynyt WEIGHT on: " .$roww['weight'] . "<br>");
                        echo ("Databasesta löytynyt HEIGHT on: " .$roww['height'] . "<br>");
                        echo ("Databasesta löytynyt HASHED PASSWORD on: " .$roww['hashed_password'] . "<br>");
                        echo ($roww['user_first'] .", you are now logged in!" . "<br>");
                    /*    header ("Location: https://users.metropolia.fi/~jariput/web/web_project/apuohjelmia/hello.php"); */
                    /*    header ("Location: https://www.is.fi/");  */
                
                        $URL = "https://www.petrasilavuori.com/";
                        if( headers_sent() ) { echo("<script>location.href='$URL'</script>"); }
                        else { header("Location: $URL"); }
                        exit; 


                    } 
                    else 
                    {
                        echo "Please check your login form password and username";
                    } 
                    echo "<br>";
        ?>
<!-- THE END OF THE LOGIN FORM FUNCTIONS -->
        </section>

        <footer id="main_footer">
            <div id="main_footer_left" class="footer_section">
                <h3 class="footer_h3">CONTACT INFORMATION</h3>
                <p class="footer_p"><strong>Phone:</strong> +358 56 876 3546</p>
                <p class="footer_p"><strong>Address:</strong> Mannerheimintie 108 C 14<br>00250 Helsinki Finland</p>
                <p class="footer_p" id="email"><a href="mailto:placeholder@placeholder.com?Subject=Greetings!" target="_top">CONTACT
                        US</a></p>
                <div id="social_items">
                    <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.reddit.com" target="_blank"><i class="fab fa-reddit-alien"></i></a>
                    <a href="https://www.pinterest.com" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
            <div id="main_footer_right" class="footer_section">
                <h3 class="footer_h3">COMPANY AND LEGAL</h3>
                <p class="footer_p" onclick="overlayControl()">Disclaimer</p>
                <p class="footer_p" onclick="overlayControl()">Privacy Policy</p>
                <p class="footer_p" onclick="overlayControl()">Legal Information</p>
                <p class="footer_p" onclick="overlayControl()">Media</p>
            </div>
        </footer>
        <section class="general_overlay">
            <p>General overlay placeholder for the Company and Legal section</p>
            <h4 id="close_general_overlay">CLOSE</h4>
        </section>
        <section id="register_overlay">
                <h2 class="overlay_h2">NEW USER REGISTRATION</h2>
            <!--    <form method="post" action="register.php"> -->
                        <form method="post">
                    <label for="register_name"><i class="fas fa-user-circle"></i>USERNAME</label>
                    <input id="register_name" type="text" name="register_name" placeholder="Username" required>
                    <label for="register_password"><i class="fas fa-unlock-alt"></i>PASSWORD</label>
                    <input id="register_password" type="password" name="register_password" placeholder="Password" required>
                    <label for="register_password_re"><i class="fas fa-unlock-alt"></i>RE-ENTER PASSWORD</label>
                    <input id="register_password_re" type="password" name="register_password_re" placeholder="Password" required>
                    <label for="register_email"><i class="fas fa-envelope"></i>EMAIL ADDRESS</label>
                    <input id="register_email" type="email" name="register_email" placeholder="placeholder@mail.com" required>
                    <label for="register_age"><i class="far fa-clock"></i> AGE</label>
                    <input id="register_age" type="date" name="register_age" required>
                    <label for="register_weight"><i class="fas fa-weight"></i>WEIGHT</label>
                    <input id="register_weight" type="number" name="register_weight" required>
                    <label for="register_height"><i class="fas fa-ruler-vertical"></i>HEIGHT</label>
                    <input id="register_height" type="number" name="register_height" required>
                    <br>
                    <button type="submit" id="register_button" onclick="">SUBMIT</button>
                    <button type="reset" id="reset">RESET</button>
                    <button type="button" id="register_close">CLOSE REGISTRATION</button>
                </form>
        </section>
    </main>

    <div id="burger">
        <div class="menu_line1 menu_lines" id="line1"></div>
        <div class="menu_line2 menu_lines" id="line2"></div>
        <div class="menu_line3 menu_lines" id="line3"></div>
    </div>

    <nav id="overlay_menu">
        <h2 class="north_beat_title">MENU</h2>
        <h2 onclick="toAbout(); menuAction()">ABOUT</h2>
        <h2 onclick="toLogin(); menuAction()">LOG IN</h2>
        <h2 onclick="toContact(); menuAction()">CONTACT</h2>
    </nav>


    <script src="login.js"></script>
<!-- REGISTER FORM FUNCTIONS BEGIN-->
        <?php
                    /*Iän tarkistaminen */
                        $date_of_birth_check = $_POST["register_age"]; 
                        $date1 = new DateTime($date_of_birth_check);
                        $date2 = new DateTime("today");
                        $date3 = new DateTime("today");
                        $date4 = $date3->modify("-124 years");
                        echo "The year backward 124 years from now is :" .$date4->format("Y");
                        echo "<br>";
                        //IF checking the validity of the date of the birth
                        if ($date1 < $date2 && $date1 > $date4) 
                            {echo "Your date of birth was entered succesfully"; 
                            

                            $username = mysqli_real_escape_string($connection, $_POST["register_name"]);
                            $password = mysqli_real_escape_string($connection, $_POST["register_password"]);
                            $email = mysqli_real_escape_string($connection, $_POST["register_email"]);
                            $date_of_birth = mysqli_real_escape_string($connection, $_POST["register_age"]);
                            $weight = mysqli_real_escape_string($connection, $_POST["register_weight"]);
                            $height = mysqli_real_escape_string($connection, $_POST["register_height"]);
                            $reenterpassword = mysqli_real_escape_string($connection, $_POST["register_password_re"]);
                            echo ("---------------------------------------------------------------------------------------------------- "  ."<br><br>");
                            echo "SALASANAN JA UUDELLEEN SYÖTETYN SALASANAN VERTAILEMINEN:";
                            echo "<br><br>";
                                /*At first check if password == reentered password */
                                /*then check if a username already exist */
                            if ($password == $reenterpassword) {
                                $sql_check_username = "SELECT * FROM user_profile WHERE username = '$username';"; /*users;";  ensimmäinen ; on SQLlle ja toinen ; on PHPlle */
                                $result2 = mysqli_query($connection, $sql_check_username); /*talletetaan $result2:een haun tuloksena löytyneet rivit */
                                $row2 =mysqli_num_rows($result2); /*$row2:een tallentuu haun tulosen rivien lukumäärä */
                                if ($row2 > 0) {
                                    echo "The username (" .$username .") is already in use!";
                                }
                                /* Hashing */
                                else { 
                                    $inputtohashing = $_POST["register_password"];
                                    $hashed_password = password_hash($inputtohashing, PASSWORD_DEFAULT);
                                    /*Verify tämä väli kuuluu login kohtaan */
                                    echo "Inputtohashing muuttujan sisältö on: " . $inputtohashing  . "<br>";
                                    echo "Hashed_password muuttujan sisältö on: " . $hashed_password . "<br>";
                                    $compare_password = password_verify($inputtohashing, $hashed_password); /*password comparison just for checking */
                                    echo "compare_password muuttujan sisältö 'just for testing'";
                                    echo "(1 = syötetty salasana ja tietokannan salasan ovat samat," . "<br>"; 
                                    echo "0 = syötetty salasana ja tietokannan salasan ovat erit) on: " . $compare_password . "<br>";
                                    /*Verify tämä väli kuuluu login kohtaan */
                     /* echo "Password and re-entered password are same"; */
                        echo "<br><br>";
                    /*-SYÖTETÄÄN REKISTERÖINTIKENTÄN TIEDOT TIETOKANTAAN-----------*/
                    $sql_insert = "INSERT INTO user_profile (username, password, email, date_of_birth, weight, height, hashed_password ) VALUES ('$username', '$password', '$email', '$date_of_birth', '$weight', '$height', '$hashed_password');";
                    $result = mysqli_query($connection, $sql_insert);
                   echo ("---------------------------------------------------------------------------------------------------- "  ."<br><br>");
                    echo "REGISTER FORM SYÖTTÖKENTÄN TIEDOT";
                    echo "<br>";
                    echo "<br>";
                    echo "USERNAME: " . $username;
                    echo "<br>";
                    echo "PASSWORD: " . $password;
                    echo "<br>";
                    echo "E-MAIL: " . $email;
                    echo "<br>";
                    echo "DATE OF BIRTH: " . $date_of_birth;
                    echo "<br>";
                    echo "WEIGHTWEIGHT: " . $weight;
                    echo "<br>";
                    echo "HEIGHT: " . $height;
                    echo "<br>"; 
                    echo "RE-ENTERED PASSWORD: " . $reenterpassword;
                    echo "<br>";
                    echo "<br><br>";
                    echo ("---------------------------------------------------------------------------------------------------- "  ."<br><br>");
                     /*------------------------------------------------------------*/
                    $sql = "SELECT * FROM user_profile WHERE username = '$username';"; 
                    $result1 = mysqli_query($connection, $sql);
                    $roww = mysqli_fetch_assoc($result1);
                        echo ("REGISTER FORM SYÖTTÖKENTÄN USERNAMEA VASTAAVAT TIETOKANNAN KENTÄT: " ."<br>");
                        echo "Databasesta löytynyt USERNAME on: " .$roww['username'] ."<br>";
                        echo "Databasesta löytynyt PASSWORD on: " .$roww['password'] ."<br>";
                        echo "Databasesta löytynyt E-MAIL on: " .$roww['email'] ."<br>";
                        echo ("Databasesta löytynyt DATE OF BIRTH on: " .$roww['date_of_birth'] . "<br>");
                        echo ("Databasesta löytynyt WEIGHT on: " .$roww['weight'] . "<br>");
                        echo ("Databasesta löytynyt HEIGHT on: " .$roww['height'] . "<br>");
                        echo ("Databasesta löytynyt HASHED PASSWORD on: " .$roww['hashed_password'] . "<br>");
                        echo ($roww['user_first'] .", you are now registered!" . "<br>");
                  } /* usernamen vertaamisen if-lauseen else päättyy */
                } /* salasanan vertaamisen if-lause päättyy tähän ja sen else alkaa */
                    else {
                        echo "Password and re-entered password are not same";
                        }
                } 
                    else {
                        echo "Please check the date of birth format and the date";
                        }
                ?>
    <!-- THE END OF THE REGISTER FORM FUNCTIONS -->

</body>

</html>