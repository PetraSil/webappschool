<?php
include "db.php";
include "alerts.php";
include "loginphp.php";
include "session.php";
?>

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
            <p id="main_header_p">
                Join thousands of users on a journey to get in the shape of your life through the beats of music.
                North
                Beat was designed to help you motivate yourself to keep pushing for that extra kilometer and never give
                up!
            </p>
            <div id="action_logos">
                <div class="action_container" onmouseover="feature_overlay(this)" onmouseout="feature_overlay(this)">
                    <div class="action_container_overlay">
                        <i class="fas fa-headphones-alt"></i>
                        <h3 class="action_container_overlay_h3">MUSIC</h3>
                        <p class="overlay_p">"Integrate your favourite music, own or through Spotify, to seamlessly guide your workouts."</p>
                        <button type="button" class="action_container_button">SIGN IN</button>
                    </div>
                </div>
                <div class="action_container" onmouseover="feature_overlay(this)" onmouseout="feature_overlay(this)">
                    <div class="action_container_overlay">
                        <i class="fas fa-user"></i>
                        <h3 class="action_container_overlay_h3">SOCIAL</h3>
                        <p class="overlay_p">"Share your workout and challenge your friends to compete who can hit it the fastest, longest or hardest!"</p>
                        <button type="button" class="action_container_button">SIGN IN</button>
                    </div>
                </div>
                <div class="action_container" onmouseover="feature_overlay(this)" onmouseout="feature_overlay(this)">
                    <div class="action_container_overlay">
                        <i class="fas fa-heartbeat"></i>
                        <h3 class="action_container_overlay_h3">DATA</h3>
                        <p class="overlay_p">"Study the depths of your workouts through detailed analysis and let the application be your coach."</p>
                        <button type="button" class="action_container_button">SIGN IN</button>
                    </div>
                </div>
            </div>
            <h4 id="call_to_action_h4"><span>SIGN IN <i class="fas fa-arrow-down"></i>REGISTER</span></h4>

        </header>

        <section id="main_login_section_container">
            <div id="login_alert">
                <h2>SOMETHING WENT WRONG</h2>
                <hr>
                <p>Please check your login credentials and try again. If the problems persists, please contact the site support.</p>
                <h4 id="close_login_alert">CLOSE</h4>
            </div>
            <div id="main_login_section">
                <div id="login_section_left">
                    <div id="logo_small"></div>
                </div>
                <div id="login_section_right">
                    <header id="login_section_header">
                        <h2 class="north_beat_title">NORTH BEAT</h2>
                    </header>
                    <iframe name="target" id="target"></iframe>
                    <form method="post" target="target" autocomplete="off">
                        <label for="user_name"><i class="fas fa-user-circle"></i>USERNAME</label>
                        <input id="user_name" type="text" name="user_name" placeholder="Username">
                        <label for="user_password"><i class="fas fa-unlock-alt"></i>PASSWORD</label>
                        <input id="user_password" type="password" name="user_password" placeholder="Password">
                        <br>
                        <button type="submit" id="login_button">SIGN IN</button>
                        <button type="reset" id="reset_login">RESET</button>
                    </form>
                    <footer id="login_section_footer">
                        <h4 id="register_open" onclick="toLogin(this.id)"><span>Register</span></h4>
                        <h4 id="help_h4"><span>Help</span></h4>
                    </footer>

                </div>
                <div id="alert">
                    <h2 class="overlay_h2">WARNING!</h2>
                    <p class="overlay_p">Incorrect login credentials. Please read the login help and follow the
                        instructions given. New user registration is not in use yet It will be activated in the future.</p>
                    <button id="alert_close_button">CLOSE ALERT</button>
                </div>
                <section id="help_overlay">
                    <div class="extra_container">
                        <h2 class="overlay_h2">LOGIN HELP</h2>
                        <p class="overlay_p" id="extra_container_p">In order to log in, use the login credentials provided below:
                            <br>
                            <br><strong>USERNAME:</strong> placeholder
                            <br><strong>PASSWORD:</strong> placeholder
                            <br>
                            <br>
                            If you have further problems with logging in, please contact the developers for
                            instructions and help.
                        </p>

                        <button id="help_close_button">CLOSE HELP</button>
                    </div>
                </section>
            </div>
        </section>
        <footer id="main_footer">
            <div id="main_footer_left" class="footer_section">
                <h3 class="footer_h3">INTUITIVE INNOVATIONS</h3>
                <p class="footer_contact_p"><strong>Phone:</strong> +358 56 876 3546</p>
                <p class="footer_contact_p"><strong>Address:</strong> Mannerheimintie 108 C 14<br>00250 Helsinki Finland</p>
                <p class="email_p" id="email"><a href="mailto:placeholder@placeholder.com?Subject=Greetings!" target="_top">CONTACT
                        US</a></p>
                <div id="social_items">
                    <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.reddit.com" target="_blank"><i class="fab fa-reddit-alien"></i></a>
                    <a href="https://www.pinterest.com" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                    <a href="https://www.github.com" target="_blank"><i class="fab fa-github"></i></a>
                </div>
            </div>
            <div id="main_footer_right" class="footer_section">
                <h3 class="footer_h3">COMPANY AND LEGAL</h3>
                <p class="footer_p">Disclaimer</p>
                <p class="footer_p">Privacy Policy</p>
                <p class="footer_p">Legal Information</p>
                <p class="footer_p">Media</p>
            </div>
        </footer>
        <section class="general_overlay" id="legal_jargon">
            <h2 class="overlay_h2">LEGAL JARGON</h2>
            <p>The obligations in this license document would apply, with the Copyright Holder. This license includes the Program (or a work based on the Program. Patents mean patent claims licensable by such Contributor that the recipients all the rights and licenses granted hereunder, each Recipient hereby assumes sole responsibility to secure any other right or remedy of any work of authorship, whether in tort (including negligence), contract, or otherwise, or (b) ownership of more than your cost of developing and maintaining multi-platform application software. For suppliers: In-depth testing increases customer satisfaction and keeps development and maintenance of standards-based products. For buyers: adequate conformance testing leads to reduced integration costs and reasonable attorneys' fees and expenses. The application of the Work. If you are welcome to redistribute it under the terms and conditions. You may aggregate the Package with respect to end users, business partners and the following in a wiki, for example, the production of a file containing Licensed Product, including Modifications made by or assigned to North Beat or to ask for permission.
                <br><br>
                Code"../ means Source Code version of that or any Contributor that the additions and/or changes are related to those Modifications, and cause the direction or management of such noncompliance. If all Recipient's rights under this License would be entitled to make restrictions that forbid anyone to deny you these rights or ownership rights under this License, the term "modification".) Each licensee is addressed as "you". Activities other than You; and/or (b) any new file or other form resulting from mechanical transformation or translation of a Source form, including but not limited to, documenting any non-standard features, executables, or modules, and provided that each external component clearly identifies itself whenever it is sufficient to give any other party; and iv) states that any patent claims licensable by the laws of the Agreement in relation to such a Package if it has sufficient copyright rights in the name of the item itself, though there may be published from time to time.
                <br><br>
                Each version is given a distinguishing version number. Once covered code has been obtained. Contributor APIs. If Contributor's Modifications are derived, directly or indirectly, out of inability to use any license other than the Agreement is retained in Python alone or in Digital Content within such NOTICE file, excluding those notices that do not appear in their name, without prior written permission. THE SOFTWARE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES, SO THIS EXCLUSION AND LIMITATION MAY NOT APPLY TO LIABILITY FOR ANY SPECIAL, INDIRECT OR CONSEQUENTIAL DAMAGES OR OTHER DEALINGS IN THE SOFTWARE. Preamble The licenses for most software are designed to take over this role.
                <br><br>
                For written permission, please contact the creators. Products derived from the same sections as part of your rights under a particular version of the material terms or conditions of this License Agreement shall be reformed to the terms of this License, including a description of how and where You are permitted provided that you can change NetHack or use a modified version that you changed the files containing Modifications. New versions of this License shall be included in all respects by the Current Maintainer are considered to be covered by the terms of this License.
                <br><br>    
                Derivative Works. b. Under claims of patents that are compatible with the preceding Article shall be subject to this Agreement shall be reformed to the Licensor relating to Covered Code. You must duplicate, to the terms of Paragraphs 1 and 2 above provided that the name of products derived from the conditions under which it was received. In addition, mere aggregation of another work not based on infringement of intellectual property rights is required to exercise the rights and limitations under the terms applicable to software source code, object code form.</p>
                <br><br>
            <h4 id="close_general_overlay">CLOSE</h4>
        </section>
        <section id="register_overlay">
                <h2 class="overlay_h2" id="register_overlay_h2">NEW USER REGISTRATION</h2>
                <form id="register_form" method="post" target="target" autocomplete="off">
                    <label for="register_name"><i class="fas fa-user-circle"></i>USERNAME</label>
                    <input id="register_name" type="text" name="register_name" placeholder="Username" required>
                    <label for="register_password"><i class="fas fa-unlock-alt"></i>PASSWORD</label>
                    <input id="register_password" type="password" name="register_password" placeholder="Password" 
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                    title="Password must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters." required>
                    <label for="register_password_re"><i class="fas fa-unlock-alt"></i>RE-ENTER PASSWORD</label>
                    <input id="register_password_re" type="password" name="register_password_re" placeholder="Password" required>
                    <label for="register_email"><i class="fas fa-envelope"></i>EMAIL ADDRESS</label>
                    <input id="register_email" type="email" name="register_email" placeholder="placeholder@mail.com" required>
                    <label for="register_age"><i class="far fa-clock"></i> DATE OF BIRTH</label>
                    <input id="register_age" type="date" name="register_age" required>
                    <label for="register_weight"><i class="fas fa-weight"></i>WEIGHT (kg)</label>
                    <input id="register_weight" type="number" step="0.1" min="0" max="500" name="register_weight" placeholder="e.g. 80.0" required>
                    <label for="register_height"><i class="fas fa-ruler-vertical"></i>HEIGHT (cm)</label>
                    <input id="register_height" type="number" step="0.1" min="0" max="300" name="register_height" placeholder="e.g. 180.0" required>
                    <input id="permission_box" type="checkbox" required><span id="tos">I accept the terms of service.</span>
                    <br>
                    <button type="submit" id="register_button" class="register_buttons">SUBMIT</button>
                    <button type="reset" id="reset_register" class="register_buttons">RESET</button>
                    <button type="button" id="register_close" class="register_buttons" onclick="toLogin(this.id)">CLOSE REGISTRATION</button>
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
        <h2 class="overlay_menu_h2" id="overlay_menu_about">ABOUT</h2>
        <h2 class="overlay_menu_h2" id="overlay_menu_log">LOG IN</h2>
        <h2 class="overlay_menu_h2" id="overlay_menu_contact">CONTACT</h2>
    </nav>

    <script src="login.js"></script>

</body>

</html>