<?php

include 'include/function/header.php';

?>
<html>
<head>
    <title>webanter</title>

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="js/background.js" type="text/javascript"></script>

    <style type="text/css">
        a:link {color: black;}      /* unvisited link */
        a:visited {color: black;}   /* visited link */
        a:hover {color: black;}     /* mouse over link */
        a:active {color: black;}    /* selected link */
    </style>

</head>
<body onload="backgr()">
<header>
    <div class="dropdown">
        <button class="dropbtn">Language</button>
        <div class="dropdown-content">
            <a href="?lang=hu"><span><img src="https://www.worldometers.info/img/flags/small/tn_hu-flag.gif" alt="HU-flag" style="width: 65px; height: 40px;"></img></span></a>
            <a href="?lang=en"><span><img src="https://www.worldometers.info/img/flags/small/tn_uk-flag.gif" alt="US-flag" style="width: 65px; height: 40px;"></img></span></a>
        </div>
    </div>
</header>


<div class="main">
<div class="gradient-border" id="box">
    <h2><?= $lang['head'] ?></h2><br>
    <h2><?= $lang['text1'] ?></h2><br>

        <div class="wrapper">
            <a href="pages/login.php"><span><?= $lang['login'] ?></span></a>
        </div>

        <div class="wrapper">
            <a href="pages/register.php"><span><?= $lang['register'] ?></span></a>
        </div>

</div>
</div>

<footer class="container-fluid text-white" id="footer">
    © 2021 MelodyZ
</footer>
</body>
</html>