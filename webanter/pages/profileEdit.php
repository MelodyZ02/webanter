<?php

define('path', $_SERVER['DOCUMENT_ROOT'] . '/include/function/header.php');
include path;


// '/webanter/include/function/header.php' --otthon;
// '/include/function/header.php' --suli;

require_once '../config.php';

$db = null;

try{
    $db = new PDO(
        "mysql:host=" . CONFIG_DBSERVER . ";dbname=" . CONFIG_DBNAME . ";charset=utf8mb4",
        CONFIG_DBUSER, CONFIG_DBPASS);
}
catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

$sql = "SELECT * FROM userinfo WHERE userId=:user  ";
$stmt = $db->prepare($sql);
$stmt->bindValue(':user', $_SESSION['user']);
$stmt->execute();
$fetch = $stmt->fetch();

?>
<html>
<head>
    <title>webanter</title>

    <link rel="stylesheet" type="text/css" href="../css/profile.css">
    <script src="../js/background.js" type="text/javascript"></script>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

</head>
<body onload="backgr()">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 justify-content-between">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            if(isset($_GET['lang'])):
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="main.php?lang=<?=$_GET['lang']?>"><?= $lang['nav1'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="friends.php?lang=<?=$_GET['lang']?>"><?= $lang['nav4'] ?></a>
                </li>
            <?php else:?>
                <li class="nav-item">
                    <a class="nav-link" href="main.php"><?= $lang['nav1'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="friends.php"><?= $lang['nav4'] ?></a>
                </li>
            <?php endif;?>
            <li class="nav-item">
                <a class="nav-link" href="profile.php"><b><?= $fetch['name'] ?></b></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown navbar-right">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    <?= $lang['btn'] ?>
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item bg-dark text-light" href="?lang=hu">Magyar</a>
                    <a class="dropdown-item bg-dark text-light" href="?lang=en">English</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="card text-center border-dark mb-3 mx-auto bg-light rounded-top" style="width: 50rem;">

    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="profile-info ">
                <div class="panel">
                    <div class="bio-graph-heading">
                        <div class="user-heading round">
                            <img src="<?= $fetch['profileIMG'] ?>" alt="" style="height: 15rem; width: 15rem;">
                            <h1><?= $fetch['name'] ?></h1>
                            <p></p>
                        </div>
                    </div>
                    <div class="panel-body bio-graph-info">
                        <form role="form" method="post" action="../configs/profileconfig.php">
                        <br>
                        <div class="row">
                            <div class="bio-row">
                                <span style="font-weight: bold"><?= $lang['name'] ?></span>
                                <div class="mb-3" style="max-width: 20rem; padding-left: 3rem;">
                                    <input name="realname" type="text" id="name" class="form-control form-control-md" value="<?= $fetch['name'] ?>" style="text-align: center"/>
                                </div>
                            </div>
                            <div class="bio-row">
                                <span style="font-weight: bold; max-width: 20rem;"><?= $lang['profileImage'] ?></span>
                                <div class="mb-3" style="max-width: 20rem; padding-left: 3rem;">
                                    <input name="profileIMG" type="text" id="profileIMG" class="form-control form-control-md" value="<?= $fetch['profileIMG'] ?>" style="text-align: center"/>
                                </div>
                            </div>
                            <div class="bio-row">
                                <span style="font-weight: bold"><?= $lang['profileGender'] ?></span>
                                <div class="mb-3" style="max-width: 20rem; padding-left: 3rem;">
                                    <input name="gender" type="text" id="gender" class="form-control form-control-md" value="<?= $fetch['gender'] ?>" style="text-align: center"/>
                                </div>
                            </div>
                            <div class="bio-row">
                                <span style="font-weight: bold">Email</span>
                                <div class="mb-3" style="max-width: 20rem; padding-left: 3rem; text-align: center">
                                    <input name="email" type="text" id="email" class="form-control form-control-md" value="<?= $fetch['email'] ?>" style="text-align: center"/>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center bio-row-btn">
                                <input name="submit" class="bn632-hover bn22" type="submit" value="<?= $lang['savebtn'] ?>">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<footer class="container-fluid text-secondary" id="footer">
    © 2022 Copyright: MelodyZ
</footer>

</body>
</html>
