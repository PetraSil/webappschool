<?php
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>North Beat - Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500" rel="stylesheet">
</head>
<body>
    
    <nav id="navbar_desktop">
        <ul>
            <li id="nav_dashboard">
                <h5>Dashboard</h5>
            </li>
            <li id="nav_contact">
                <h5>Contact</h5>
            </li>
            <li id="nav_home">
                <h5>Home</h5>
            </li>
            <li id="nav_logout">
                <h5>Logout</h5>
            </li>
            <li id="nav_site">
                <h5 id="nav_site_h5">Menu</h5>
            </li>
        </ul>
    </nav>

    <div id="burger">
        <div class="menu_line1 menu_lines" id="line1"></div>
        <div class="menu_line2 menu_lines" id="line2"></div>
        <div class="menu_line3 menu_lines" id="line3"></div>
    </div>

    <nav id="site_map_overlay">
        <h2 class="sitemap_h2">SITEMAP</h2>
        <hr>
        <h3 class="sitemap_h3" id="menu_home">Home</h3>
        <h3 class="sitemap_h3" id="menu_dashboard">Dashboard</h3>
        <h3 class="sitemap_h3" id="menu_data">Data</h3>
        <h3 class="sitemap_h3" id="menu_music">Music</h3>
        <h3 class="sitemap_h3" id="menu_profile">Profile</h3>

        <h2 class="sitemap_h2">OPTIONS</h2>
        <hr>
        <h3 class="sitemap_h3" id="menu_application">Application</h3>
        <h3 class="sitemap_h3" id="menu_personal">Personal</h3>

        <p class="email_p" id="email_sitemap"><a href="mailto:placeholder@placeholder.com?Subject=Greetings!" target="_top">CONTACT US</a></p>
        <div id="social_items_sitemap">
            <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.reddit.com" target="_blank"><i class="fab fa-reddit-alien"></i></a>
            <a href="https://www.pinterest.com" target="_blank"><i class="fab fa-pinterest-p"></i></a>
            <a href="https://www.github.com" target="_blank"><i class="fab fa-github"></i></a>
        </div>
    </nav>

    <nav id="overlay_menu">
        <h2 class="north_beat_title">MENU</h2>
        <h2 class="overlay_menu_h2" id="overlay_menu_dashboard">DASHBOARD</h2>
        <h2 class="overlay_menu_h2" id="overlay_menu_contact">CONTACT</h2>
        <h2 class="overlay_menu_h2" id="overlay_menu_site">SITEMAP</h2>
        <h2 class="overlay_menu_h2" id="overlay_menu_home">HOME</h2>
        <h2 class="overlay_menu_h2" id="overlay_menu_logout">LOGOUT</h2>
    </nav>

    <div id="logo_large"></div>

    <section id="dashboard_main_container">
        <div class="dashboard_section" id="dashboard_header"><h1 id="dashboard_h1">HEY THERE,<br><?php echo $_SESSION["session_username"];?>!</h1>            
        <h2 id="dashboard_h2">What are your plans for<br>this beautiful <span id="weekday"></span>?</h2>
        </div>
        <div class="dashboard_section" id="dashboard_images">
            <div class="dashboard_img_container"></div>
            <div class="dashboard_img_container" id="dashboard_data"><h2>DATA</h2></div>
            <div class="dashboard_img_container"></div>
            <div class="dashboard_img_container" id="dashboard_music"><h2>MUSIC</h2></div>
            <div class="dashboard_img_container"></div>
            <div class="dashboard_img_container" id="dashboard_profile"><h2>PROFILE</h2></div>
        </div>
    </section>

    <footer id="main_footer">
        <div id="main_footer_left" class="footer_section">
            <h3 class="footer_h3">INTUITIVE INNOVATONS</h3>
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
    
    <section class="general_overlay">
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

    <div id="alert">
        <h2>WARNING!</h2>
        <p>This section is still under construction and thus, can not be accessed.
            <br>
             We apologize for the inconvenience!
        </p>
        <button type="button" id="alert_button">CLOSE</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
    <script src="dashboard.js"></script>

</body>
</html>