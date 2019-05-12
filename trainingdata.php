<?php
session_start();
if(isset($_POST["user_name"]))
$_SESSION["session_username"] = $_POST["user_name"];
include 'xmlparser.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>North Beat - Data</title>
    <link rel="stylesheet" href="data.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500" rel="stylesheet">
    <link rel="stylesheet" href="https://openlayers.org/en/v5.3.0/css/ol.css" type="text/css">
    <link rel="stylesheet" href="css/mapcss.css">

</head>
<body onload="init();">


   
    <nav id="navbar_desktop">
        <ul>
            <li id="nav_data">
                <h5>Data</h5>
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

    <nav id="overlay_menu">
        <h2 class="north_beat_title">MENU</h2>
        <h2 class="overlay_menu_h2" id="overlay_menu_data">DATA</h2>
        <h2 class="overlay_menu_h2" id="overlay_menu_contact">CONTACT</h2>
        <h2 class="overlay_menu_h2" id="overlay_menu_site">SITEMAP</h2>
        <h2 class="overlay_menu_h2" id="overlay_menu_home">HOME</h2>
        <h2 class="overlay_menu_h2" id="overlay_menu_logout">LOGOUT</h2>
    </nav>

    <div id="logo_large"></div>

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

    <section id="data_main_container">
        <div id="data_top"><h1>USER DATA</h1></div>
        <div id="data_bottom">
            <div class="data_section_wide" id="data1">
                <div class="data_meta_section" id="map_meta1">
                    <div id="data_overlay_calendar"></div>
                   
                    <form action='' method='post'>
                    <button class="widebtn" name='submit' value='0'>Running 17.4.2019</button>
                    <button class="widebtn" name='submit' value='1'>Running 18.1.2019</button>
                    <button class="widebtn" name='submit' value='2'>Walking 18.7.2018</button>
                    <button class="widebtn" name='submit' value='3'>Running 17.7.2018</button>
                    </form>

                    <?php 
                    if($_POST['submit']==0)      { $datafilename='lebuskilintuvaara'; }
                    else if($_POST['submit']==1) { $datafilename='kalliotoolo'; } 
                    else if($_POST['submit']==2) { $datafilename='sallanlenkki'; } 
                    else if($_POST['submit']==3) { $datafilename='tvmastolenkki'; }
                    ?>

                    <script type="text/javascript">var datafilename = "<?= $datafilename ?>";</script>

                </div>
                <div class="data_meta_section" id="map_meta2">
                    <div id="map"></div>
                </div>
            </div>
            <div class="data_section" id="graph1">
                <canvas id="hrdata" width="100" height="100"></canvas>
            </div>
            <div class="data_section" id="graph1">
                <div class="data_meta_section" id="data_meta5">
                    <?
                    echo "<p>Average heart-rate: $averagehr bpm<br>
                    min heart-rate: $minHR bpm<br>
                    max heart-rate: $maxHR bpm<br></p>";
                    ?>
                </div>
            </div>
     
            <div class="data_section" id="graph2">
                <div class="data_meta_section" id="graph1">
                <?
                echo "<p>Your average speed was $avspeed km/h<br>
                    and your highspeed $highspeed km/h<br></p>";
                ?>
                </div>
            </div>
            <div class="data_section" id="graph2">
                    <canvas id="speedChart" width="100" height="100"></canvas>
            </div>

            <div class="data_section" id="graph3">
                    <canvas id="altitudeChart" width="100" height="100"></canvas>
            </div>
            <div class="data_section" id="graph3">
                <div class="data_meta_section" id="graph1">
                <? 
                echo "<p>You traveled $totaldistance meters,<br>
                ascended $ascension meters <br>
                and descended $descension meters <br>
                during your workout<br></p> "
                ?>
                </div>
            </div>
            
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

    <section class="data_overlay" id="data_overlay_charts">
        <h1 class="data_overlay_meta_h1">TRAINING TIME</h1>
        <h2 class="data_overlay_meta_h2">
            This section is a placeholder and under development. It represents an example of data and one of the presentation types used in the application, 
            so the look and the feel of this section will most likely be changed for the final product. It shows minutes trained per month and you can select which months are being shown by clicking
            the names of the month and then compare them against one another.<br>
            <button type="button" id="close_data_overlay_charts">RETURN</button>
        </h2>
        <div class="charts_sections">
            <canvas id="placeholderChart" width="100" height="100"></canvas>
        </div>
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
    <script>
    
        var yHeartRate = <?php echo json_encode($hrArray); ?>;
        var ySpeed = <?php echo json_encode($speedArray); ?>;
        var yAltitude = <?php echo json_encode($altitudeArray); ?>;
        var xTimepoints = <?php echo json_encode($timeformat); ?>;
        

        var maxHRValue= Math.max.apply(null, yHeartRate)+10
        var minHRValue= Math.min.apply(null, yHeartRate)-10
        var maxAltValue= Math.max.apply(null, yAltitude)+5
        var maxSpeedValue= Math.max.apply(null, ySpeed)+5

        //window.alert(yHeartRate);

        /*Chart.Legend.prototype.afterFit = function() {
        this.height = this.height +100;
        };*/
        
        Chart.defaults.global.animation.duration = 2000;
        Chart.defaults.global.defaultFontSize = 30; 

        var hr_ctx = document.getElementById("hrdata").getContext("2d");
        
        //GRADIENT COLOR DEFINITIONS
        var purple_orange_gradient = hr_ctx.createLinearGradient(0, 0, 0, 500);
        purple_orange_gradient.addColorStop(0, 'orange');
        purple_orange_gradient.addColorStop(1, 'purple');

        var hrChart =new Chart(hr_ctx, {
            type: 'line',
            data: {
                labels: xTimepoints,
                datasets: [{
                        label: "Heart rate",
                        data: yHeartRate,
                        fill: false,
                        backgroundColor: purple_orange_gradient ,
                        borderColor: purple_orange_gradient,
                        borderCapStyle: 'butt',
                        pointRadius: 0.5,
                        hoverRadius: 4,
                        borderWidth:1
                        
                    }]
            },
            options: {
                responsive: true,
                legend: {
                    padding:0,
                    fontSize:5
                },
                hover: {
                    mode: 'label'
                },
                scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Time',
                                fontSize:15
                            },
                            ticks: {
                                beginAtZero: true,
                                fontSize: 10,
                            }
                        }],
                    yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                fontSize: 10,
                                min: minHRValue - 10,
                            }
                        }]
                },
                title: {
                    display: true,
                    text: 'HEART RATE (BPM)',
                    fontSize:20
                }
            }
        });


        var speed_ctx = document.getElementById("speedChart").getContext("2d");

        //GRADIENT COLOR DEFINITIONS
        var speedGradient = speed_ctx.createLinearGradient(50, 0, 100, 700);
            speedGradient.addColorStop(1, 'green');
            speedGradient.addColorStop(0.66, 'cyan');
            speedGradient.addColorStop(0.33, 'blue');
            speedGradient.addColorStop(0, 'purple');

        //CHART DECLARATION AND  DEFINITIONS
        var speedChart= new Chart(speed_ctx, {
            type: 'line',
            data: {
                labels: xTimepoints,
                datasets: [{
                        label: "Speed",
                        data: ySpeed,
                        fill: true,
                        backgroundColor: speedGradient,
                        borderColor: speedGradient,
                        borderCapStyle: 'butt',
                        pointRadius: 0.5,
                        hoverRadius: 4,
                        borderWidth:0.5
                        
                    }]
            },
            options: {
                responsive: true,
                legend: {
                    padding:0,
                    fontSize:5
                },
                hover: {
                    mode: 'label'
                },
                scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Time',
                                fontSize:15
                            },
                            ticks: {
                                beginAtZero: true,
                                fontSize: 10,
                            }
                        }],
                    yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                steps: 10,
                                stepValue: 5,
                                fontSize: 10
                            }
                        }]
                },
                title: {
                    display: true,
                    text: 'Speed (km/h)',
                    fontSize:20
                }
            }
        });

        
        var altitude_ctx = document.getElementById("altitudeChart").getContext("2d");

        //GRADIENT COLOR DEFINITIONS
        var mountain_gradient = altitude_ctx.createLinearGradient(0,150, 0, 750);
            mountain_gradient.addColorStop(1, 'blue');
            mountain_gradient.addColorStop(0.7, 'cyan');
            mountain_gradient.addColorStop(0.5, 'green');
            mountain_gradient.addColorStop(0.10, 'yellow');
            mountain_gradient.addColorStop(0, 'red');

        //CHART DECLARATION AND DEFINITIONS
        var altitudeChart = new Chart(altitude_ctx,  {
            type: 'line',
            data: {
                labels: xTimepoints,
                datasets: [{
                        label: "Altitude (m)",
                        data: yAltitude,
                        fill: true,
                        backgroundColor: mountain_gradient,
                        borderColor: mountain_gradient,
                        borderCapStyle: 'butt',
                        pointRadius: 1,
                        hoverRadius: 4,
                        borderWidth: 1.5
                        
                    }]
            },
            options: {
                responsive: true,
                legend: {
                    padding:0,
                    fontSize:5
                },
                hover: {
                    mode: 'label'
                },
                scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Time',
                                fontSize:15
                            },
                            ticks: {
                                beginAtZero: true,
                                fontSize: 10,
                            }
                        }],
                    yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                fontSize: 10
                            }
                        }]
                },
                title: {
                    display: true,
                    text: 'Altitude (m)',
                    fontSize:20
                }
            }
        });


    </script>

    

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>  
    <!-- Openlayers javascript libraries-->
    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <!-- OpenStreetMap OpenLayers layers.-->
    <script src="https://www.openstreetmap.org/openlayers/OpenStreetMap.js"></script>
    <!--canva.js gaphs-->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="data.js"></script>
    <script src="map.js"> </script>
   
</body>
</html>
