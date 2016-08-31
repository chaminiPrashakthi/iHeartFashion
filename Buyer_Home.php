<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>iHeart Fashion</title>
        <link rel="shortcut icon" href="imgs/ico.png">
        <link rel="stylesheet" type="text/css" href="css/homestyles.css" />
        <link rel="stylesheet" type="text/css" href="css/fontformat.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- menu circles -->
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo_1.css" />
        <link rel="stylesheet" type="text/css" href="css/style10.css" />
        <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
        <!-- sign out button -->
        <link rel="stylesheet" type="text/css" href="css/base.css" /> <!-- button -->
        <link rel="stylesheet" type="text/css" href="css/buttons.css" /> <!-- button -->
        <!-- search header -->
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <script src="js/modernizr.custom.js"></script>
        <!-- slider -->
        <script type="text/javascript" src="js/jssor.js"></script>
        <script type="text/javascript" src="js/jssor.slider.js"></script>
        <script type="text/javascript" src="js/banner.js"></script>
        <link rel="stylesheet" type="text/css" href="css/banner.css" />
        <!-- footer social -->
        <link rel="stylesheet" type="text/css" href="css/footer_social.css" />
    </head>
    <script>
        window.onload = function () {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                    document.getElementById("menuCircle").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "menuCircle.html", true);
            xmlhttp.send();
        };

            function showHint(str) {
                if (str.length == 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "autoComplete.php?q=" + str, true);
                    xmlhttp.send();
                }
            }
    </script>
    <body>
        <?php
        $host = "localhost";
        $port = "3308";
        $user = "root";
        $password = "1234";
        $database = "mydb";

        $conn = new mysqli($host, $user, $password, $database, $port, $port);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT f_name, l_name FROM user INNER JOIN user_login WHERE username = (SELECT user_login_username FROM login_session ORDER BY idlogin_session LIMIT 1)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row["f_name"] . " " . $row["l_name"];
            }
        } else {
            $name = "Unknown User";
        }
        ?>
        <div>
            <table style="width: 100%;height: 80px;background:#000000;">
                <tr style="background:#000000;margin:0;">
                    <td class="homename" style="width: 20%;">Welcome <?php echo $name ?>,</td>
                    <td><p style="text-align:right;font-family:trebuchet MS, sans-serif;">Suggestions: <span id="txtHint" style="color:#fff;text-align:right;width:100%;"></span></p></td>
                    <td style="width: 35%;">
                        <div class="container">
                            <div class="main clearfix">
                                <div class="column">
                                    <div id="sb-search" class="sb-search">
                                        <form>
                                            <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search"  onkeyup="showHint(this.value)">
                                            <input class="sb-search-submit" type="submit" value="">
                                            <span class="sb-icon-search"></span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /container -->
                        <script src="js/classie.js"></script>
                        <script src="js/uisearch.js"></script>
                        <script>
        new UISearch(document.getElementById('sb-search'));
                        </script>
                    </td>
                    <td style="width: 15%;">
                        <div class="box bg-1">
                            <a href="Login.html" class="button button--nina button--text-thick button--text-upper button--size-s" data-text="Sign Out">
                                <span>S</span><span>i</span><span>g</span><span>n</span> <span>O</span><span>u</span><span>t</span>
                            </a>		
                        </div>
                    </td>
                </tr>
            </table>
            <div style="padding-top: 0px;margin-top: 0px;" class="lineDiv"></div>

            <div id="slider1_container" style="position: relative; top: 10px; left: 350px; width: 600px; height: 300px; overflow: hidden; ">

                <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 300px;
                     overflow: hidden;">
                    <div>
                        <a u=image href="#"><img src="img/poster4.jpg" /></a>
                    </div>
                    <div>
                        <a u=image href="#"><img src="img/poster7.jpg" /></a>
                    </div>
                    <div>
                        <a u=image href="#"><img src="img/poster6.jpg" /></a>
                    </div>
                    <div>
                        <a u=image href="#"><img src="img/poster5.jpg" /></a>
                    </div>
                    <div>
                        <a u=image href="#"><img src="img/poster1.jpg" /></a>
                    </div>
                    <div>
                        <a u=image href="#"><img src="img/poster2.jpg" /></a>
                    </div>
                    <div>
                        <a u=image href="#"><img src="img/poster3.jpg" /></a>
                    </div>
                    <div>
                        <a u=image href="#"><img src="img/poster9.jpg" /></a>
                    </div>
                </div>

                <div u="navigator" class="jssorb01" style="bottom: 16px; right: 10px;">
                    <div u="prototype"></div>
                </div>
                <span u="arrowleft" class="jssora05l" style="top: 123px; left: 8px;">
                </span>
                <span u="arrowright" class="jssora05r" style="top: 123px; right: 8px;">
                </span>
                <script>
                    jssor_slider1_starter('slider1_container');
                </script>
            </div>
            <div id="menuCircle"></div>
        </div>
        
        <?php 
        $sql2 = "SELECT * FROM images";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                $image = $row["path"] . "" ;
                $iname = $row["name"]."";
                ?><img src="<?php echo $iname; ?>" alt="" ><?php
            }
        } else {
            $image = "";
            $iname = "";
        }
        ?>
        
        
        
        
        <div class="footer" style="margin-top:800px;">
            <table style="width:100%;">
                <tr>
                    <td></td>
                    <td style="width:30%;">
                        <div id="main">
                            <ul id="navigationMenu">
                                <li>
                                    <a class="home" href="#">
                                        <img src="img/social1.png" alt=""/>
                                        <span>Facebook</span>
                                    </a>
                                </li>

                                <li>
                                    <a class="about" href="#">
                                        <img src="img/social2.png" alt=""/>
                                        <span>Twitter</span>
                                    </a>
                                </li>

                                <li>
                                    <a class="portfolio" href="#">
                                        <img src="img/social3.png" alt=""/>
                                        <span>Google+</span>
                                    </a>
                                </li>

                                <li>
                                    <a class="contact" href="#">
                                        <img src="img/social4.png" alt=""/>
                                        <span>LinkedIn</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
