<?php

include 'include/function/header.php';

?>
<html>
<head>
    <title>webanter</title>

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="js/background.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body onload="backgr()">
<!--
<header>
<nav>
<div class="navbar">
<div class="dropdown">
    <button class="dropbtn">Language</button>
    <div class="dropdown-content">
        <a href="?lang=hu"><span><img src="https://www.worldometers.info/img/flags/small/tn_hu-flag.gif" alt="HU-flag" style="width: 65px; height: 40px;"></img></span></a>
        <a href="?lang=en"><span><img src="https://www.worldometers.info/img/flags/small/tn_uk-flag.gif" alt="US-flag" style="width: 65px; height: 40px;"></img></span></a>
    </div>
</div>
</div>
</nav>
</header>
-->
<nav class="navbar">
    <div class="dropdown">
        <ul class="navbar-nav" >
            <li class="nav-item" >
                <div class="dropdown">
                    <button class="dropbtn">Language</button>
                    <div class="dropdown-content">
                        <a href="?lang=hu"><span><img src="https://www.worldometers.info/img/flags/small/tn_hu-flag.gif" alt="HU-flag" style="width: 65px; height: 40px;"></img></span></a>
                        <a href="?lang=en"><span><img src="https://www.worldometers.info/img/flags/small/tn_uk-flag.gif" alt="US-flag" style="width: 65px; height: 40px;"></img></span></a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="gradient-border" id="box">
    <h2><?= $lang['head'] ?></h2><br>
    <h2><?= $lang['text1'] ?></h2><br>
        <a href="pages/login.php"><span><?= $lang['login'] ?></span></a>
        <a href="pages/register.php"><span><?= $lang['register'] ?></span></a>
</div>


<footer class="container-fluid text-white" id="footer">
    © 2021 MelodyZ
</footer>
</body>
</html>