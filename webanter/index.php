<?php

include 'include/function/header.php';

?>
<html>
    <head>
        <title>webanter</title>
        
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <script src="js/background.js" type="text/javascript"></script>

    </head>
    <body onload="backgr()">
        <header>
            <div class="dropdown">
                <button class="dropbtn">Language</button>
                <div class="dropdown-content">
                  <a href="?lang=hu"><img src="https://www.worldometers.info/img/flags/small/tn_hu-flag.gif" style="width: 65px; height: 40px;"></img></a>
                  <a href="?lang=en"><img src="https://www.worldometers.info/img/flags/small/tn_uk-flag.gif" style="width: 65px; height: 40px;"></img></a>
                </div>
            </div>
        </header>

        <div class="box">
                    <h2><?= $lang['head'] ?></h2><br>
                    <h2><?= $lang['text1'] ?></h2><br>
                <div class="btn-group">
                    <a href="pages/login.php"><button style="width:50%"><?= $lang['login'] ?></button></a>
                    <a href="register.html"><button style="width:50%"><?= $lang['register'] ?></button></a>
                </div>
        </div>

        <footer class="container-fluid text-white" id="footer">
                © 2021 MelodyZ
        </footer>
    </body>
</html>