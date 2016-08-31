
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
        <!-- Search -->
        <link rel="stylesheet" type="text/css" href="css/normalize_1.css" />
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/demo_2.css" />
        <link rel="stylesheet" type="text/css" href="css/set1.css" />

        <link rel="stylesheet" type="text/css" href="css/table.css" />

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

        function loadTable() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                    document.getElementById("loadData").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "loadTable.php", true);
            xmlhttp.send();
        }

        function hover(val) {
            if (val === 1) {
                document.getElementById("updatei").src = "imgs/deletei.png";
                document.getElementById("deletei").src = "imgs/update.png";
            } else if (val === 2) {
                document.getElementById("deletei").src = "imgs/updatei.png";
                document.getElementById("updatei").src = "imgs/update.png";
            }
        }

        function tableData(value, search) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                    document.getElementById("loadData").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "tableData.php?value=" + value + "&search=" + search, true);
            xmlhttp.send();
        }
    </script>
    <body onload="loadTable()">
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


            <div class="container">

                <section class="content">
                    <span class="input input--hoshi">
                        <input onkeyup="tableData(1, this.value)" class="input__field input__field--hoshi" type="text" id="input-4" />
                        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                            <span class="input__label-content input__label-content--hoshi">Product Name</span>
                        </label>
                    </span>

                    <span class="input input--hoshi">
                        <select onchange="tableData(2, this.value)" class="input__field input__field--hoshi" type="text" id="input-5" style="text-align:right;">
                            <option value="0">Colour</option>
                            <?php
                            $sql2 = "SELECT colour FROM products";
                            $result2 = $conn->query($sql2);

                            if ($result2->num_rows > 0) {
                                while ($row2 = $result2->fetch_assoc()) {
                                    $colour = $row2["colour"];
                                    ?>
                                    <option value="<?php echo $colour; ?>"><?php echo $colour; ?></option>
                                    <?php
                                }
                            } else {
                                ?>
                                <option><?php echo ''; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-2" for="input-5">
                            <span class="input__label-content input__label-content--hoshi"></span>
                        </label>
                    </span>

                    <span class="input input--hoshi">
                        <select onchange="tableData(3,this.value)" class="input__field input__field--hoshi" type="text" id="input-7" style="text-align:right;">
                            <option value="0">Size</option>
                            <?php
                            $sql2 = "SELECT size FROM products";
                            $result2 = $conn->query($sql2);

                            if ($result2->num_rows > 0) {
                                while ($row2 = $result2->fetch_assoc()) {
                                    $size = $row2["size"];
                                    ?>
                                    <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                                    <?php
                                }
                            } else {
                                ?>
                                <option><?php echo ''; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-2" for="input-5"></label>
                    </span>

                    <span class="input input--hoshi">
                        <select onchange="tableData(4,this.value)" class="input__field input__field--hoshi" type="text" id="input-7" style="text-align:right;">
                            <option value="0">Price</option>
                            <option value="1"> < Rs: 1000</option>
                            <option value="2">Rs: 1000 - Rs: 2000</option>
                            <option value="3">Rs: 2000 - Rs: 3000</option>
                            <option value="4">Rs: 3000 - Rs: 4000</option>                            
                            <option value="5">Rs: 5000 < </option>                            
                        </select>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-2" for="input-5"></label>
                    </span>

                    <span class="input input--hoshi" style="color: #bbb;">
                        Shoes<input onclick="tableData(5,1)" class="rad" type="radio" id="" name="type" value="Shoes" style="width:45px;margin-bottom:25px;margin-top:33px;"/>
                        Hand Bags<input onclick="tableData(5,2)" class="rad" type="radio" id="" name="type" value="Hand_Bags" style="width:45px;"/>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="input-6">
                            <span class="input__label-content input__label-content--hoshi"></span>
                        </label>
                    </span>
                </section>


            </div><!-- /container -->
            <script src="js/classie.js"></script>
            <script>
                            (function () {
                                if (!String.prototype.trim) {
                                    (function () {
                                        // Make sure we trim BOM and NBSP
                                        var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                                        String.prototype.trim = function () {
                                            return this.replace(rtrim, '');
                                        };
                                    })();
                                }

                                [].slice.call(document.querySelectorAll('input.input__field')).forEach(function (inputEl) {
                                    // in case the input is already filled..
                                    if (inputEl.value.trim() !== '') {
                                        classie.add(inputEl.parentNode, 'input--filled');
                                    }

                                    // events:
                                    inputEl.addEventListener('focus', onInputFocus);
                                    inputEl.addEventListener('blur', onInputBlur);
                                });

                                function onInputFocus(ev) {
                                    classie.add(ev.target.parentNode, 'input--filled');
                                }

                                function onInputBlur(ev) {
                                    if (ev.target.value.trim() === '') {
                                        classie.remove(ev.target.parentNode, 'input--filled');
                                    }
                                }
                            })();
            </script>

            <div class="table" id="loadData">

            </div>
            <div class="footer" style="margin-top:80px;">
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
